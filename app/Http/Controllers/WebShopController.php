<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SubscriptionEmailRequest;
use App\Product;
use App\Subcategory;
use App\Subscription;
use App\Tag;
use Illuminate\Http\Request;

class WebShopController extends Controller
{
    public function search_products(Request $request)
    {
        /* dd($request); */

        $products  = Product::where('status', 'ACTIVE')->where('name', 'LIKE', "%$request->search_words%")->paginate(12);
        /* dd($products); */
        return view('web.shop_grid', compact('products'));
    }
    public function search_products_by_category(Request $request, Category $category)
    {

        $products  = Product::where('status', 'ACTIVE')->where('category_id', $request->search_id)->paginate(12);
        /* dd($products); */

        return view('web.shop_grid', compact('products'));
    }
    public function search_products_by_subcategory(Request $request, Subcategory $subcategory)
    {

        $products  = Product::where('status', 'ACTIVE')->where('subcategory_id', $request->search_id_subcategory)->paginate(12);
        /* dd($products); */

        return view('web.shop_grid', compact('products'));
    }
    public function search_products_by_tag(Request $request)
    {

        $tag = Tag::where('id', $request->search_id_tag)->first();
        $products = $tag->products()->where('status', 'ACTIVE')->paginate(12);


        /* $products = Product::Has('tags', 'LIKE' ,$request->search_id_tag)->get(); */
        /* $products  = Product::where('status', 'ACTIVE')->where(DB::table('tags')->get(), $request->search_id_tag)->paginate(12); */
        /* dd($products); */
        return view('web.shop_grid', compact('products'));
    }
    public function subscription_email(SubscriptionEmailRequest $request)
    {
        Subscription::create([
            'email' => $request->subscription_email
        ]);
        return back()->with('mensaje', 'Se ha suscrito correctamente');
    }
    public function rate_product(Request $request,Product $product)
    {
        /* dd($product); */
        $product->rate($request->rate);
        dd($product->userSumRating());
    }
}
