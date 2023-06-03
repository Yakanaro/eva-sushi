<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $positions = Position::all();
        return view('index', compact('categories', 'positions'));
    }
}
