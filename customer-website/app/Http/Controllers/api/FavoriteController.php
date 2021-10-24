<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    
    public function store($food_id,$user_id)
    {
        
        $user=User::find($user_id);
        $food=Food::find($food_id);

        if(! $user) return response()->json(["status"=>"error","error"=>"user not found",]);
        if(! $food) return response()->json(["status"=>"error","error"=>"food not found"]);
        
        foreach ($food->favorites as $favorite) {
            if($favorite->user_id == $user->id){
                if($favorite->food_id == $food->id){
                    $favorite->delete(); 
                    return response()->json([
                        "status"=>"warn",
                        "message" => "food deleted form your wishlist"            
                    ]);
                }
            };
        };
        if(Favorite::create(['food_id'=>$food->id,'user_id'=>$user->id])){
            return response()->json([
                "status"=>"success",  
                "message" => "food added to your wishlist"           
            ]);
        }
        return response()->json(["status"=>"error","error"=>"something worng ,food not added to your wishlist",]);
        
    }


}
