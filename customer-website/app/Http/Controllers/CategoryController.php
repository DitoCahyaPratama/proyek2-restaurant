<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {   
        return view('category-food')->with([
            "category"=>$category,
            "foods"=>$category->foods_with_paginate(),
        ]) ;      
    }
}
