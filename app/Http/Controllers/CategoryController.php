<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Image;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       /*  $this->middleware('can:categories.create')->only(['create','store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit','update']);
        $this->middleware('can:categories.show')->only(['show']);
        $this->middleware('can:categories.destroy')->only(['destroy']); */
    }
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(StoreRequest $request, Category $category)
    {
        /* dd($request); */
        $category->my_store($request);
        return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
        $products = Product::get();
        $subcategories = $category->subcategories;
        return view('admin.category.show', compact('category', 'subcategories', 'products'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $category->my_update($request);
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function upload_image(Request $request, $id, Category $category)
    {


        $category = Category::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $urlimage = '/image/' . $image_name;
        }



        $category->images()->create([
            'url' => $urlimage,
        ]);
        $image = Image::where('imageable_type', 'App\category')->Where('imageable_id', $category->id)->first();
        $image->delete();
        
    }
}
