<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    public $table = 'cuisines';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function restaurants()
    {
        return $this->belongsToMany(\App\Models\Restaurant::class, 'restaurant_cuisines');
    }
    public function restaurant_with_paginate()
    {
        return $this->belongsToMany(\App\Models\Restaurant::class, 'restaurant_cuisines')->paginate(12);
    }

}
