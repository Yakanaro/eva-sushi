<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'street' => 'required|string',
            'house' => 'nullable|string',
            'building' => 'nullable|string',
            'entrance' => 'nullable|string',
            'apartment' => 'nullable|string',
            'floor' => 'nullable|string',
            'intercom_code' => 'nullable|string',
        ]);
        $data['user_id'] = Auth::id();
        $address = Address::create($data);

        return redirect()->route('cart.index', compact('address'));
    }

    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $addresses = Address::all();
        $positionCount = $cart->positions()->count();
        return view('address.index', compact('addresses', 'positionCount'));
    }

    public function destroy(Address $address)
    {
        $user = Auth::user();
        $cart = $user->cart;
        $positionCount = $cart->positions()->count();
        $address->delete();
        return redirect()->route('address.index', compact('positionCount'));

    }
}
