<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Colors\StoreRequest;
use App\Http\Requests\Colors\UpdateRequest;
use App\Image;

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
        /* dd($request); */
        $color->my_store($request);
        return redirect()->route('colors.index');
    }
    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }
    public function edit(Color $color, Image $image)
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
    public function upload_image(Request $request, $id, Color $color)
    {
        

        $color = Color::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $urlimage = '/image/' . $image_name;
        }



        $color->images()->create([
            'url' => $urlimage,
        ]);
        $image = Image::where('imageable_type', 'App\color')->Where('imageable_id', $color->id)->first();
        $image->delete();
        return back();
    }
}
