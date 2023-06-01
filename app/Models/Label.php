<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'position_labels', 'label_id', 'position_id');
    }
}
