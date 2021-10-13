<?php

namespace App\Http\Controllers;

use App\Order;
use App\PaymentPlatform;
use App\ShoppingCart;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('client_auth');
    }
    public function my_account()
    {
        return view('web.my_account');
    }
    public function checkout()
    {
        $paymentPlatforms = PaymentPlatform::all();
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        foreach($shopping_cart->shopping_cart_details as $key => $abc){
            /* dd($abc->product_id); */
           /*  dd($abc->product->sell_price); */
        };


        return view('web.checkout', compact('paymentPlatforms'));
    }
    public function orders()
    {
        $orders = auth()->user()->orders;
        /* return $orders; */
        return view('web.orders', compact('orders'));
        
    }
}
