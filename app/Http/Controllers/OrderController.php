<?php

namespace App\Http\Controllers;

use App\Business;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::all();
        
        return view('admin.order.index', compact('orders', ));
    }
    public function show(Order $order)
    {
        /* dd($order)->total(); */
        $business = Business::firstOrFail();
        $user = $order->user;
        $details = $order->order_details;
        $business = Business::firstOrFail();
        return view('admin.order.show', compact('order', 'business', 'user', 'details', 'business'));
    }
}
