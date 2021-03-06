<?php

namespace App\Http\Controllers;

use App\Business;
use App\Http\Requests\Client\ChangePasswordRequest;
use App\Order;
use App\PaymentPlatform;
use App\ShoppingCart;
use App\User;
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
        $subtotal = $shopping_cart->subtotal();
        $products = $shopping_cart->shopping_cart_details;


        return view('web.checkout', compact('paymentPlatforms', 'products', 'subtotal'));
    }
    public function orders()
    {
        $orders = auth()->user()->orders;
        /* return $orders; */
        return view('web.orders', compact('orders'));
        
    }
    public function account_info()
    {
        $user = auth()->user();
        return view('web.account_info', compact('user'));
    }
    public function address_edit()
    {
        $profile = auth()->user()->profile;
        $user = auth()->user();
        return view('web.address_edit', compact('profile', 'user'));
    }
    public function change_password()
    {
        
        $user = auth()->user();
        
        return view('web.change_password', compact('user'));
    }
    public function order_details(Order $order)
    {
        
        $details = $order->order_details();
        
        return view('web.order_details', compact('details', 'order'));
    }
}
