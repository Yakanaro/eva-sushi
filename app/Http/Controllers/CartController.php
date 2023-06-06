<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addItem()
    {
        $cart = Cart::create();
        $position->cart_id = $cart->id;
        $position->save();
        $positions = $cart->positions;

        return view('orders.NewOrder', compact('positions'));
    }
}
