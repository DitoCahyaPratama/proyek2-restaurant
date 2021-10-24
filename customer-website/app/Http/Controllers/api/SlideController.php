<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getSlides()
    {
        $slides = array();
        foreach (Slide::all() as $slide) {
            if ($slide->has_media) {
                array_unshift($slides, [
                    "id" => $slide->id,
                    "text" => $slide->text,
                    "image" => $slide->getFirstMediaUrl('image')
                ]);
            }
        }
        return response()->json($slides);
    }
}
