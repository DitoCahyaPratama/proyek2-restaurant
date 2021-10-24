<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodController extends Controller
{
    // get top 6 rated foods
    public function topRatedFood()
    {
        
        // array containe the top rated foods
        $response = array();
        // get 6 top rated foods
        $foods=Food::withAvg('foodReviews','rate')
                ->orderBy('food_reviews_avg_rate','desc')
                ->take(6)
                ->get();

        foreach ($foods as $food ) {
            $data = [
                'food' => $food,
                'cover' => $food->getFirstMediaUrl('image'),
                'restaurant' => $food->restaurant,
                'rate' =>$food->rate,
                'category'=>$food->category,
                'price'=>getPrice($food->getPrice()),                
                'discount'=>$food->discount_price !=0 ? number_format(100-($food->discount_price * 100 / $food->price),0) : null,
                'reviews'=>count($food->foodReviews)
            ];
            array_push($response, $data);
        }
        //  return the response in json format
        return response()->json([
            "foods"=>$response,
        ]);
    }
}

