<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $positions = Position::all();
        $user = Auth::user();
//        $positionCount = $user ? $user->cart->positions()->count() : 0;
        $positionCount = 0;
        return view('index', compact('categories', 'positions', 'positionCount'));
    }
}
