<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use App\ShoppingCartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailController extends Controller
{
  
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($product, $request);
        return back();
    }

    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }
}
