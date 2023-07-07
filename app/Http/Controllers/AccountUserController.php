<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountUserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $positions = Position::all();
        $user = Auth::user();
        $positionCount = $user && $user->cart ? $user->cart->positions()->count() : 0;
        return view('account.index', compact('categories', 'positionCount', 'positions', 'user'));
    }
}
