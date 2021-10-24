<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = 'carts';
    
    public $fillable = [
        'food_id',
        'user_id',
        'quantity'
    ];

    protected $casts = [
        'food_id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'integer'
    ];
    public static $rules = [
        'food_id' => 'required|exists:foods,id',
        'user_id' => 'required|exists:users,id'
    ];
    
    public function food()
    {
        return $this->belongsTo(\App\Models\Food::class, 'food_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function extras()
    {
        return $this->belongsToMany(\App\Models\Extra::class, 'cart_extras','cart_id');
    }
}
