<?php

namespace App\Http\Controllers;

use App\Business;
use App\Order;
use App\OrderDetail;
use App\Profile;
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
       /*  $total = 0;
        foreach ($order->order_details() as $key => $order_detail) {
            $total += $order_detail->total();
        }
        return $total; */
        /* return $order->order_details->total(); */
       /*  dd($orderDetail->total());
        dd($order->subtotal());
        return $order->subtotal(); */
        /* dd($order)->total(); */
        $business = Business::firstOrFail();
       /*  $user = $order->user;
         */
        
       
        
        
        $business = Business::firstOrFail();
        return view('admin.order.show', compact('order', 'business', 'business'));
    }
}
