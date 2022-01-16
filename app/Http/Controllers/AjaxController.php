<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\Subcategory;
use Dotenv\Result\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function get_compras(Request $request)
    {

        $data = DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) asc limit 12');
        return $data;
    }
    public function products_ver($id)
    {
        dd($id);
    }
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
