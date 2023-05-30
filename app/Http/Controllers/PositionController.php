<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::all();

        return view('admin.positionsList', compact('positions'));
    }

    public function create()
    {
        return view('admin.createPosition');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $position = new Position();
        $position->fill($data);
        $position->save();

        return redirect()
            ->route('admin.positions');
    }

    public function update(Position $position)
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $position->update($data);
        return redirect()->route('admin.positions');
    }


    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('admin.positions');
    }
}
