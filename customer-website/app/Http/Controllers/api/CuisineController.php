<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function index()
    {
        return response()->json([
            "Cuisines"=>Cuisine::withCount('restaurants')
                                ->orderBy('restaurants_count','desc')
                                ->take(6)
                                ->get(),
        ]);   
    }

    public function randomCategories()
    {
        return response()->json([
            "categories"=>Category::inRandomOrder()->limit(4)->get(),
        ]);
    }
    public function randomCuisines()
    {
        return response()->json([
            "cuisines"=>Cuisine::inRandomOrder()->limit(4)->get(),
        ]);
    }

    
}
