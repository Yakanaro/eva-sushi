<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'preview_image', 'categories_id', 'labels', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'position_labels', 'position_id', 'label_id');
    }
    public function inCart()
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        $cart = $user->cart;

        if (!$cart) {
            return false;
        }

        return $cart->positions()->where('positions.id', $this->id)->exists();
    }
}
