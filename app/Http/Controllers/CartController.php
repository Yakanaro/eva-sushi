<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Position;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $cart = $user->cart ? $user->cart->load('positions') : null;
            $positionCount = $cart ? $cart->positions->count() : null;
            $totalPrice = $cart ? $cart->positions()->sum('price'): null;
            $addresses = Address::get();
        } else {
            $positionCount = 0;
            $cart = null;
            $addresses = collect();
            $totalPrice = 0;
        }
        return view('cart.index', compact('cart', 'positionCount', 'addresses', 'user', 'totalPrice'));
    }

    public function addToCart(Request $request)
    {
        $positionId = $request->input('position_id');
        $position = Position::find($positionId);

        if (!$position) {
            return response()->json(['error' => 'Позиция не найдена'], 404);
        }

        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cart->positions()->attach($position);
        return response()->json(['success' => 'Позиция успешно добавлена в корзину']);
    }

    public function destroy(Position $position)
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->positions()->detach($position);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
