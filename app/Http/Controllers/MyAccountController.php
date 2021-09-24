<?php

namespace App\Http\Controllers;

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
        return view('web.checkout');
    }
}

