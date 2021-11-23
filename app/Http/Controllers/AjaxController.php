<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\Subcategory;
use Dotenv\Result\Result;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = Subcategory::where('category_id',
            $request->category)->get();
            return response()->json($subcategories);
        }
    }
    public function get_products_by_subcategory(Request $request)
    {
       /*  dd($request->subcategory_id); */
        if ($request->ajax()) {
            /* $products = Product::where(
                'subcategory_id',
                $request->subcategory_id
            )->get();
            return response()->json($products); */
            return datatables()->of(Product::where(
                'subcategory_id', $request->subcategory_id)->get())
            ->addColumn('btn','admin.category._actions')
            ->rawColumns(['btn'])
            ->toJson();
        }
    }
    public function get_product_by_product(Request $request)
    {
        
        if ($request->ajax()) {
            $product = Product::where('id',
                
                $request->product
            )->get();
            return response()->json($product);
        }
    }
    public function get_images_by_product(Request $request,Product $product)
    {
        $product->get_images($request);
        /* dd($request); */
        /* if ($request->ajax()) {
            
            $images = Image::where('imageable_type','App\Product')->where('imageable_id', $request->product)->get();
            return json_encode(array($images));
        } */
    }
}
