<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cuisine;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('welcome')->with([
            "categorys" => Category::withCount('foods')
                        ->withAvg('foods', 'price')
                        ->orderBy('foods_count', 'desc')
                        ->get(),
            "countRestaurant" => Restaurant::count(),
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|max:50',
        ]);

        if (str_starts_with($request->search, '#')) {
            $search_value = str_replace("#", "", $request->search);

            $category = Category::where('name', $search_value)->first();
            $cuisine = Cuisine::where('name', $search_value)->first();

            $category ? $foods = $category->foods->take(12) : $foods = array();
            $cuisine ? $restaurants = $cuisine->restaurants->take(12) : $restaurants = array();

            return view('search-result')->with([
                "category" => $search_value,
                "cuisine" => $search_value,
                "search_value" => null,
                "restaurants" => $restaurants,
                "foods" => $foods,
            ]);
        }

        $search_value = $request->search;
        $restaurants = Restaurant::where('name', 'like', '%' . $search_value . '%')->take(12)->get();
        $foods = Food::where('name', 'like', '%' . $search_value . '%')->take(12)->get();
        return view('search-result')->with([
            "cuisine" => null,
            "category" => null,
            "search_value" => $search_value,
            "restaurants" => $restaurants,
            "foods" => $foods
        ]);
    }

    public function getFavoriteFooods($skip)
    {
        $foods = array();
        foreach (auth()->user()->favoriteFoods->skip($skip * 8)->take(8) as $fav_food) {
            $food = Food::find($fav_food->food_id);
            array_push($foods, [
                'food' => $food,
                'cover' => $food->getFirstMediaUrl('image'),
                'restaurant' => $food->restaurant,
                'rate' => $food->getRateAttribute(),
                'category' => $food->category,
                'price' => $food->getPrice(),
                'discount' => $food->discount_price != 0 ? number_format(100 - ($food->discount_price * 100 / $food->price), 0) : null,
                'reviews' => count($food->foodReviews)
            ]);
        }
        return response()->json(["favFoods" => $foods]);
    }
}
