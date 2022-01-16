<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Image;
use App\Texture;
use App\Provider;
use App\Size;
use App\Subcategory;
use App\Tag;
use Barryvdh\DomPDF\Facade as PDF;




class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $subcategories = Subcategory::get();
        /* $providers = Provider::get(); */
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.create', compact('categories', 'tags', 'subcategories', 'colors', 'sizes'));
    }
    public function store(StoreRequest $request, Product $product)
    {
        /* dd($request); */
        /* dd($request); */
        $product = $product->my_store($request);
        
        return redirect()->route('products.edit', $product);
    }
    public function show(Product $product)
    {
        
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        /* $providers = Provider::get(); */
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'tags', 'colors', 'sizes'));
    }
    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }

    public function upload_image(Request $request, $id){
        
        if ($request->ajax()) {
            $product = Product::find($id);
            $urlimages = [];
            $filesLink = array();
            if ($request->hasFile('files')) {
                $images = $request->file('files');
                
                foreach ($images as $key => $image) {
                    $image_name = time().'_'.$image->getClientOriginalName();
                    $ruta = public_path().'/image/';
                    $image->move($ruta, $image_name);
                    $urlimages[]['url'] = '/image/'. $image_name;;
                    $url = '/image/'. $image_name;
                    array_push($filesLink, $url);
                }
            }
            $product->images()->createMany($urlimages);
            return $filesLink;
        }
    }
    public function file_delete(Request $request)
    {
        $image = Image::find($request->key);
        $image->delete();
        return true;
    }
    public function upload_texture(Request $request, $id)
    {

        if ($request->ajax()) {
            $product = Product::find($id);
            $urltextures = [];
            $filesLink = array();
            if ($request->hasFile('files')) {
                $textures = $request->file('files');

                foreach ($textures as $key => $texture) {
                    $texture_name = time() . '_' . $texture->getClientOriginalName();
                    $ruta = public_path() . '/texture/';
                    $texture->move($ruta, $texture_name);
                    $urltextures[]['url'] = '/texture/' . $texture_name;;
                    $url = '/texture/' . $texture_name;
                    array_push($filesLink, $url);
                }
            }
            $product->textures()->createMany($urltextures);
            return $filesLink;
        }
    }
    public function file_delete_texture(Request $request)
    {
        $texture = Texture::find($request->key);
        $texture->delete();
        return true;
    }
}
