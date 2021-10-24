<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartExtra extends Model
{
    use HasFactory;

    public $table = 'cart_extras';
    public $timestamps = false;

    public $fillable = [
        'extra_id',
        'cart_id',
    ];

    protected $casts = [
        'extra_id' => 'integer',
        'cart_id' => 'integer',
    ];
    
     
    
}
