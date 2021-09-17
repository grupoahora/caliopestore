<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Colors\StoreRequest;
use App\Http\Requests\Colors\UpdateRequest;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $colors = Color::get();
        return view('admin.color.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.color.create');
    }
    public function store(StoreRequest $request, Color $color)
    {
        $color->my_store($request);
        return redirect()->route('colors.index');
    }
    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }
    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }
    public function update(UpdateRequest $request, Color $color)
    {
        $color->my_update($request);
        return redirect()->route('colors.index');
    }
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index');
    }
}
