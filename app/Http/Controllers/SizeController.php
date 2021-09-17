<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sizes\StoreRequest;
use App\Http\Requests\Sizes\UpdateRequest;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sizes = Size::get();
        return view('admin.size.index', compact('sizes'));
    }
    public function create()
    {
        return view('admin.size.create');
    }
    public function store(StoreRequest $request, Size $size)
    {
        $size->my_store($request);
        return redirect()->route('sizes.index');
    }
    public function show(Size $size)
    {
        return view('admin.size.show', compact('size'));
    }
    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }
    public function update(UpdateRequest $request, Size $size)
    {
        $size->my_update($request);
        return redirect()->route('sizes.index');
    }
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('sizes.index');
    }
}
