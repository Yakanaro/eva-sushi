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
        $cart = auth()->user()->cart;
//        $positionCount = $cart->positions()->count();
        $positionCount = 0;
        return view('index', compact('categories', 'positions', 'positionCount'));
    }
}
