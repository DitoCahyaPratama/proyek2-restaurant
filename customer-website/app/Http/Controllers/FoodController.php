<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('foods.index')->with([
            "foods"=>Food::latest()->paginate(6),
            "total"=>Food::count(),
        ]) ;  
    }
}
