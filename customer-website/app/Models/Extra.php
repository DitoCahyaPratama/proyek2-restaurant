<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;
    
    public $table = 'extras';
    
    public function group()
    {
        return $this->belongsTo(\App\Models\ExtraGroup::class, 'extra_group_id', 'id');
    }
    
}
