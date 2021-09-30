<?php

namespace App\Http\Controllers;

use App\PaymentPlatform;
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
        return view('web.checkout', compact('paymentPlatforms'));
    }
    public function orders()
    {
        $orders = auth()->user()->orders;
        return view('web.orders', compact('orders'));
        
    }
}

