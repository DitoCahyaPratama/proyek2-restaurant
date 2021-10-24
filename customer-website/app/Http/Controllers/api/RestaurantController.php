<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //get total number of restarnts
    public function total()
    {
        return response()->json([
            "total" => Restaurant::count(),
        ]);
    }
    // get restaurants with skiping (n=$skip) restaurants
    public function index($skip)
    {
        return response()->json([
            "restaurants" => Restaurant::latest()
                ->take(9)
                ->skip(9 * $skip)
                ->with('cuisines')
                ->get()
                ->map
                ->format()
        ]);
    }
    // get top 4 rated restaurants
    public function topRatedRestarant()
    {
        return response()->json([
            "restaurants" => Restaurant::withAvg('restaurantReviews', 'rate')
                ->orderBy('restaurant_reviews_avg_rate', 'desc')
                ->take(4)
                ->with('cuisines')
                ->get()
                ->map
                ->format()
        ]);
    }
    // serche for a restaurants
    public function search(Request $request)
    {
        return response()->json([
            "restaurants" => Restaurant::where('name', 'like', '%' . $request->search . '%')
                ->take(10)
                ->get()
                ->map
                ->format()
        ]);
    }
    // show the detaill of restaurant
    public function show(Restaurant $restaurant)
    {
        $foods = array();
        $reviews = array();
        foreach ($restaurant->foods as $food) {

            $groups = array();
            foreach ($food->extras as $extra) {
                $gname = $extra->group ? $extra->group->name : "undefind groupe";
                $groups["$gname"] = [];
            }
            foreach ($food->extras as $extra) {
                $gname = $extra->group ? $extra->group->name : "undefind groupe";
                array_push($groups["$gname"], $extra);
            }

            $likedBy = array();
            foreach ($food->favorites as $favorite) {
                array_push($likedBy, $favorite->user->id);
            }

            array_push($foods, [
                "food" => $food,
                "price" => $food->getPrice(),
                "price_format" => getPrice($food->getPrice()),
                "cover" => $food->getFirstMediaUrl('image') != "" ? $food->getFirstMediaUrl('image') : "/images/food-placeholder.jpeg",
                "rate" => $food->getRateAttribute() ? $food->getRateAttribute() : null,
                "category" => $food->category,
                "extras_groups" => $groups,
                "isLikedBy" => $likedBy,
            ]);
        }
        foreach ($restaurant->restaurantReviews as $review) {
            array_push($reviews, [
                "rate" => $review->rate,
                "review" => $review->review,
                "user" => $review->user,
                "user_avatar" => $review->user->getFirstMediaUrl('avatar'),
                "published" => $review->created_at->diffForHumans(),
            ]);
        }
        return response()->json([
            "restaurant" => $restaurant,
            "restaurant_rate" => $restaurant->rate,
            "reviews" => $reviews,
            "foods" => $foods,
            "pictures " => $restaurant->getMedia('picture'),
        ]);
    }
    // filter the liste of resturants V1
    public function filter(Request $request)
    {
        $restaurants = array();
        // filter the Restaurant with rate
        if ($request->rate != null) {
            foreach (Restaurant::withAvg('restaurantReviews', 'rate')->get() as $restaurant) {
                if ($restaurant->restaurant_reviews_avg_rate >= $request->rate) {
                    if (!in_array($restaurant->id, $restaurants)) {
                        array_push($restaurants, $restaurant->id);
                    }
                }
            }
        }
        // get the restaurant who belong to the cuisines selected
        if (count($request->cuisine) > 0) {
            foreach ($request->cuisine as $cuisine_id) {
                foreach (Restaurant::all() as $restaurant) {
                    foreach ($restaurant->cuisines as $cuisine) {
                        if ($cuisine->id == $cuisine_id) {
                            if (!in_array($restaurant->id, $restaurants)) {
                                array_push($restaurants, $restaurant->id);
                            }
                        }
                    }
                }
            }
        }
        // get the restaurant that contains foods with food price between the price selected
        if ($request->price != null) {
            foreach (Restaurant::all() as $restaurant) {
                foreach ($restaurant->foods as $food) {
                    if ($food->getPrice() >= $request->price['min'] && $food->getPrice() <= $request->price['max']) {
                        if (!in_array($restaurant->id, $restaurants)) {
                            array_push($restaurants, $restaurant->id);
                        }
                    }
                }
            }
        };
        //$request->distance;
        $response = array();
        foreach ($restaurants as $restaurant_id) {
            array_push($response, Restaurant::find($restaurant_id)->format());
        }
        //  return the response in json format
        return response()->json([
            "restaurants" => $response,
        ]);
    }
}
