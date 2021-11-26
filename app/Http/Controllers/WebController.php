<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\Http\Requests\SubscriptionEmailRequest;
use App\Product;
use App\SocialMedia;
use App\Subcategory;
use App\Subscription;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class WebController extends Controller
{
    public function wishlist()
    {
        return view('web.wishlist');
    }
    public function about_us()
    {
        return view('web.about_us');
    }
    
    public function blog_details()
    {
        return view('web.blog_details');
    }
    public function blog()
    {
        return view('web.blog');
    }
    public function cart()
    {
        return view('web.cart');
    }
    public function contact_us()
    {
        
        return view('web.contact_us');
    }
    public function login_register()
    {
        
        return view('web.login_register');
    }
    public function shop_grid()
    {
        
        
        $products = Product::paginate(12);
        
        return view('web.shop_grid', compact('products') );
    }
    public function product_details(product $product)
    {
        $products = Product::where('subcategory_id', $product->subcategory_id)->get();
        $products_category = Product::where('category_id', $product->category_id)->get();
        /* dd($products); */
        return view('web.product_details', compact('product', 'products', 'products_category'));
    }
    public function subcategory_details(Subcategory $subcategory)
    {
        $products = product::get();
        /* dd($product); */
        return view('web.subcategory_details', compact('subcategory', 'products'));
    }
    
    public function welcome()
    {
        
        /* $categories = Category::all();
        $business = Business::all(); */
        return view('welcome');
    }
    public function products(Request $request)
    {
        $term = $request->get('term');
        $querys = Product::where('name', 'LIKE', '%' . $term . '%')->get();

        $data =[];
        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->name
            ];
        }
        return $data;
    }
   
}
