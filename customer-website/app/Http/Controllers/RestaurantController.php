<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantReview;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        return view('restaurant.listing-with-map');
    }
    public function show(Restaurant $restaurant)
    {

        return view('restaurant.detail-restaurant')->with(
            [
                'restaurant' => $restaurant,
                'restaurant_cover' => $restaurant->getFirstMediaUrl('image')!= "" ? $restaurant->getFirstMediaUrl('image') : "/images/restaurant-placeholder.png" ,
                'restaurant_cuisine'=>$restaurant->cuisines->first()->name,
                'restaurant_rate'=>$restaurant->getRateAttribute(),
            ]
        );
    }

    public function leaveReview(Restaurant $restaurant)
    {
        return view('restaurant.leave-review')->with([
                "restaurant"=>$restaurant
            ]);
    }

    public function saveReview(Request $request)
    {
        
        request()->validate([
            'restaurant_id'=>'required',
            'rate'=>'required',
            'review'=>'required',
        ]);

        $review=RestaurantReview::create([
            'user_id'=>auth()->id(),
            'restaurant_id'=>request('restaurant_id'),
            'review'=>request('review'),
            'rate'=>request('rate')
        ]);
        if ($review) {
            return redirect("/restaurant/$request->restaurant_id");
        }
        return redirect()->back();

    }
}
