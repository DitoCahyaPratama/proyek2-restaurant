<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function index(Cuisine $cuisine)
    { 
        return view('cuisine-restaurants')->with([
            "cuisine"=>$cuisine,
            "restaurants"=>$cuisine->restaurant_with_paginate(),
        ]) ;      
    }
}
