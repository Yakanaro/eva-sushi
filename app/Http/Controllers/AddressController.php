<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

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
        $address = Address::create($data);

        return redirect()->route('home.index', compact('address'));
    }
}
