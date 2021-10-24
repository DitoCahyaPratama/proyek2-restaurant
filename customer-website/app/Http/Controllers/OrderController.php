<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartExtra;
use App\Models\CustomFieldValue;
use App\Models\DeliveryAddresse;
use App\Models\Extra;
use App\Models\Food;
use App\Models\FoodOrder;
use App\Models\FoodOrderExtra;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    public function index()
    {
        $customFields=array();
        $userAdresses=array();
        $customFieldValue=auth()->user()->customFieldValue;
        if (count($customFieldValue)!=0) {
            foreach ($customFieldValue as $customField) {
                if($customField->customField->isPhone()){
                    $customFields["phone"] = ["value"=>$customField->value,"view"=>$customField->view];
                }
                if($customField->customField->isAddress()){
                    array_push($userAdresses,["value"=>$customField->value,"view"=>$customField->view]);
                } 
            }
            $customFields["address"] = $userAdresses;
        }
        return view("order.makeOrder")->with([
            "customFields"=>$customFields
        ]);
    }
    public function store(Request $request){
        if($request->payment_method === "paypal"){
            dd('payment with paypal is comming soon');
        }
        if($request->payment_method === "card"){
            dd('payment with credit card is comming soon');
        }
        // validation
        $request->validate([
            'phone' => 'required|string',
            'address' => 'string|max:255',
            'order' => 'required',
            'payment_method' => 'required',
            'orderType' => 'required',
            'phone_type'=>'required',
        ]);
        try { 
            // get the request attr
                $order=json_decode($request->order, true);
                $user=auth()->user();
                $restaurant=Restaurant::findOrFail($order['restaurant']['id']);
                $totalPrice=0;
                $orders=array();

            // count the totalPrice
                foreach ($order['orders'] as $theOrder) {
                    $foodOrdered=Food::findOrFail($theOrder['food_id']);
                    $foodOrderedExtras=array();
                    $orderPrice=$foodOrdered->getPrice();     
                    // add the price of each extra to the food ordered price
                    foreach ($theOrder['extras'] as $extras_id) {
                        $extras=Extra::findOrFail($extras_id);
                        $orderPrice=$orderPrice+$extras->price;
                        array_push($foodOrderedExtras,$extras);
                    }
                    // price of an food with extras multiple number of meals
                    $totalPrice=$totalPrice+($orderPrice*$theOrder['numberOfMeals']);
                    // add the food with the detaile to orders food list
                    array_push($orders,[
                        'food'=>$foodOrdered,
                        'foodExtras'=>$foodOrderedExtras,
                        'price'=>$orderPrice*$theOrder['numberOfMeals'],
                        'numberOfMeals'=>$theOrder['numberOfMeals'],
                    ]);
                }
                // if the user chose Delivery order add the delivery_fee to total price
                if($order['orderType']=='Delivery'){
                    $totalPrice=$totalPrice + $restaurant->delivery_fee;
                }
                // add the admin_commission to the total price 
                $tax=$restaurant->admin_commission;
                $totalPrice=$totalPrice+$totalPrice*$tax/100;

            // create the payment for the order 
                $payment=Payment::create([
                    "price"=>$totalPrice,
                    "user_id"=>$user->id,
                    "description"=>"Order not paid yet",
                    "status"=>"Waiting for Client",
                    "method"=>$request->payment_method,
                ]);    
            // create the addres to delivery  this order
                if($request->orderType == "Delivery"){
                    $deliveryAddresse=DeliveryAddresse::create([
                        "description"=>$request->delivery_address_description ? $request->delivery_address_description : "default user address",
                        "address"=>$request->address ? $request->address : null,
                        "is_default"=>$request->address_type == "default" ? true : false,
                        "user_id"=>$user->id,
                    ]);
                }
            //add custom_fields to users 
                if ($request->address_type != "default" && $request->address != "" && $request->address != null) {
                    CustomFieldValue::create([
                        "value"=>$request->address,
                        "view"=>$request->address,
                        "custom_field_id"=>6,
                        "customizable_type"=>"App\Models\User",
                        "customizable_id"=>$user->id
                    ]);
                }
                if ($request->phone_type != "default") {
                    CustomFieldValue::create([
                        "value"=>$request->phone,
                        "view"=>$request->phone,
                        "custom_field_id"=>4,
                        "customizable_type"=>"App\Models\User",
                        "customizable_id"=>$user->id
                    ]);
                }
            
            
            
        
            // create the order
                $order=Order::create([
                    'user_id'=>$user->id,
                    'order_status_id'=>1,
                    'tax'=>$restaurant->admin_commission,
                    'delivery_fee'=>$restaurant->delivery_fee,
                    'delivery_address_id'=>$request->orderType == "Delivery" ? $deliveryAddresse->id :null,
                    'payment_id'=>$payment->id,
                    'hint'=>$request->hint ? $request->hint : null
                ]);
                
            // add the foods to the order 
                foreach ($orders as $theOrder) {
                    $foodOrder=FoodOrder::create([
                        "food_id"=>$theOrder["food"]->id,
                        "order_id"=>$order->id,
                        "quantity"=>$theOrder["numberOfMeals"],
                        "price"=>$theOrder["price"],
                    ]);
                    $cart=Cart::create([
                        'food_id'=>$theOrder["food"]->id,
                        'user_id'=>$user->id,
                        'quantity'=>$theOrder["numberOfMeals"]
                    ]);
                    // add the extras for each food into the order
                    foreach ($theOrder['foodExtras'] as $foodExtras) {
                        FoodOrderExtra::create([
                            "food_order_id"=>$foodOrder->id,
                            "extra_id"=>$foodExtras->id,
                            "price"=>$foodExtras->price,
                        ]);
                        CartExtra::create([
                            'extra_id'=>$foodExtras->id,
                            'cart_id'=>$cart->id
                        ]);
                    }    
                }
            
            return redirect('confirmOrder')
                    ->with('restaurant',$restaurant)
                    ->with('order',$order);
        } catch (\Throwable $th) {
            return redirect('NotconfirmOrder')->with('message',"Order Not confirmed");
        }      
    }
    public function confirm()
    {
        if (session('restaurant') && session('order') ) {
            return view('order.confirm-delivery')->with([
                'restaurant'=>session('restaurant'),
                'order'=>session('order')
            ]);
        }
        abort(404);
    } 
    public function orderNotconfirmed()
    {
        if (session('message')) {
            return view('order.NotconfirmOrder');
        }
        abort(404);   
    }
}
