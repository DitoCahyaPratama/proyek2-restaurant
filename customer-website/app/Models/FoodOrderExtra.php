<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrderExtra extends Model
{
    use HasFactory;
    public $table = 'food_order_extras';
    public $timestamps = false;
    protected $guarded=[];
}
