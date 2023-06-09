<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $positionCount = $cart->positions()->count();
        return view('cart.index', compact('cart', 'positionCount'));
    }

    public function addToCart(Request $request)
    {

        $positionId = $request->input('position_id');


        // Найдите позицию по ее идентификатору
        $position = Position::find($positionId);

        if (!$position) {
            return response()->json(['error' => 'Позиция не найдена'], 404);
        }

        // Получите текущую корзину пользователя или создайте новую, если она отсутствует
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Добавьте позицию в корзину
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