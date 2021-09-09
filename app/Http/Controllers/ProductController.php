<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;
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
        return view('admin.product.create', compact('categories', 'tags', 'subcategories'));
    }
    public function store(StoreRequest $request, Product $product)
    {
        $product->my_store($request);
        return redirect()->route('products.index');
    }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        /* $providers = Provider::get(); */
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'tags'));
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
}
