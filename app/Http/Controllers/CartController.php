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
            $cart = $user->cart->load('positions');
            $positionCount = $cart->positions->count();
            $addresses = Address::get();
        } else {
            $positionCount = 0;
            $cart = null;
            $addresses = collect();
        }
        return view('cart.index', compact('cart', 'positionCount', 'addresses'));
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
        $cart->positions()->detach($position);
        return redirect()->route('cart.index');
    }
}
