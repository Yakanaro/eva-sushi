<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return view('admin.labels.index', compact('labels'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string',
        ]);

        $label = new Label();
        $label->fill($data);
        $label->save();

        return redirect()->route('label.index');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        return redirect()->route('label.index');
    }
}
