<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Position;
use App\Models\PositionLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'preview_image' => 'required|file',
        ]);
//        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $category = Category::find($data['categories_id']);
        $category_title = $category->title;
        $data['preview_image'] = $request->file('preview_image')->store("images/{$category_title}", 'public');
        $labels = $data['labels'];
        unset($data['labels']);

        $position = Position::create($data);
        $position->labels()->attach($labels);

        return redirect()->route('admin.positions');
    }

    public function edit(Position $position)
    {
        $categories = Category::all();
        $labels = Label::all();
        return view('positions.edit', compact('position', 'categories', 'labels'));
    }

    public function update(Request $request, Position $position)
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'categories_id' => '',
            'labels' => '',
            'preview_image' => 'nullable|file',
        ]);

        $positions = Position::all();
        $categories = Category::all();
        $labels = Label::all();


        $category = Category::find($data['categories_id']);
        $category_title = $category->title;
        $data['preview_image'] = $request->file('preview_image')->store("images/{$category_title}", 'public');
        $label = $data['labels'];
        unset($data['labels']);

        $position->update($data);
        $position->labels()->sync($label);

//        return view('positions.index', compact('positions', 'categories', 'labels'));
        return redirect()->route('admin.positions', compact('positions', 'categories', 'labels'));
    }


    public function destroy(Position $position)
    {
        $position->labels()->detach();
        $position->delete();
        $path_img = $position->preview_image;
        Storage::disk('public')->delete($path_img);
        return redirect()->route('admin.positions');
    }
}
