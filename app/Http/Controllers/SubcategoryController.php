<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;
use App\Image;
use Dotenv\Result\Result;
use Illuminate\Http\Request;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /* $this->middleware('can:subcategories.create')->only(['create', 'store']);
        $this->middleware('can:subcategories.index')->only(['index']);
        $this->middleware('can:subcategories.edit')->only(['edit', 'update']);
        $this->middleware('can:subcategories.show')->only(['show']);
        $this->middleware('can:subcategories.destroy')->only(['destroy']); */
    }
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategories.index', compact('subcategories'));
    }
    public function create(Request $request)
    {
       
        return view('admin.subcategories.create',compact('request'));
    }
    public function store(StoreRequest $request, Subcategory $subcategory)
    {
        /* dd($request); */
        
        $subcategory->my_store($request);
       /*  return back(); */
        return redirect()->route('categories.show', $request->category_id);
    }
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategory'));
    }
    public function edit(Category $category, Subcategory $subcategory)
    {

        return view('admin.subcategories.edit', compact( 'category', 'subcategory'));
    }
    public function update(UpdateRequest $request, Subcategory $subcategory, Category $category)
    {
        
        $subcategory->my_update($request);
        
        return back()->with('info', 'se actualizo la subcategoria correctamente');
    }
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
        /* return redirect()->route('subcategories.index'); */
    }
    public function upload_image(Request $request, $id, Subcategory $subcategory)
    {


        $subcategory = Subcategory::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $urlimage = '/image/' . $image_name;
        }



        $subcategory->images()->create([
            'url' => $urlimage,
        ]);
        $image = Image::where('imageable_type', 'App\subcategory')->Where('imageable_id', $subcategory->id)->first();
        $image->delete();
        return back();
    }
}
