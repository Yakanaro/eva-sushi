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
            'house' => 'nullable|numeric',
            'building' => 'nullable|numeric',
            'entrance' => 'nullable|numeric',
            'apartment' => 'nullable|numeric',
            'floor' => 'nullable|numeric',
            'intercom_code' => 'nullable|string',
        ]);
        $data['user_id'] = Auth::id();
        $address = Address::create($data);

        return redirect()->route('cart.index', compact('address'));
    }

    public function index()
    {
        $user = Auth::user();
        $addresses = Address::all();
        $positionCount = $user && $user->cart ? $user->cart->positions()->count() : 0;
        return view('address.index', compact('addresses', 'positionCount', 'user'));
    }

    public function edit(Address $address)
    {
        return view('address.edit', compact($address));
    }

    public function update(Request $request, Address $address)
    {
        $data = request()->validate([
            'street' => 'required|string',
            'house' => 'nullable|numeric',
            'building' => 'nullable|numeric',
            'entrance' => 'nullable|numeric',
            'apartment' => 'nullable|numeric',
            'floor' => 'nullable|numeric',
            'intercom_code' => 'nullable|string',
        ]);
        $user = Auth::user();
        $addresses = Address::all();
        $positionCount = $user && $user->cart ? $user->cart->positions()->count() : 0;

        $address->update($data);
        return view('address.index', compact('addresses', 'positionCount', 'user'));
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
