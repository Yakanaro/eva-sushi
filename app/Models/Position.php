<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'categories_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
