<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use App\ShoppingCartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailController extends Controller
{
  
    public function store(Request $request, Product $product)
    {
        /* dd($request); */
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($product, $request);
        return back();
    }
    public function store_a_product(Product $product)
    {
        /* dd($product); */
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store_a_product($product);
        return back();
    }
    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        dd($request);
    }

    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        
        $shoppingCartDetail->delete();
        return back();
    }
}
