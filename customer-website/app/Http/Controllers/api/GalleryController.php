<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getRestaurantGallerie($id)
    {
        return response()->json(
            Restaurant::findOrFail($id)->galleries->map(function ($gallerie) {
                return [
                    "titel" => $gallerie->description,
                    "image" => $gallerie->getFirstMediaUrl('image')
                ];
            })
        );
    }
}
