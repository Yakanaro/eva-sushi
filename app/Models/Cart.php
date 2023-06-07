<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'basket_position', 'cart_id', 'position_id');
    }

}
