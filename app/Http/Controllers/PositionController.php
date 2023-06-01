<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Position;
use App\Models\PositionLabel;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::all();
        $categories = Category::all();
        $labels = Label::all();

        return view('admin.positionsList', compact('positions', 'categories', 'labels'));
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
            'categories_id' => '',
            'labels' => '',
        ]);
        $labels = $data['labels'];
        unset($data['labels']);

        $position = Position::create($data);
        $position->labels()->attach($labels);

        return redirect()->route('admin.positions');
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
        $position->labels()->detach();
        $position->delete();
        return redirect()->route('admin.positions');
    }
}
