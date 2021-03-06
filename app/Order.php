<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'shipping_status',
        'payment_status',
        'user_id',
        'order_date',
        'updated_at',
        'subtotal',
        'tax',
    ];
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subtotal()
    {
        $total = 0;
        foreach ($this->order_details as $key => $order_detail) {
            $total += $order_detail->total();
        }
        return $total;
    }
    
    public function totaltax()
    {
        return $this->subtotal() * $this->tax;
    }
    public function update_stock($id, $quantity)
    {
        $product = Product::find($id);
        $product->substract_stock($quantity);
    }
    /* public function total()
    {
        return $this->subtotal + $this->totaltax();
    } */
    public static function my_store()
    {
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $order = self::create([
            'shipping_status'=> 'PENDING',
            'payment_status'=> 'PAID',
            'user_id' => Auth::user()->id,
            'order_date' => Carbon::now(),
            /* 'subtotal' => $shopping_cart->total_price(),
            'tax' => 0.19, */
            
        ]);
        $order->add_order_details($shopping_cart);
        
        
    }
    public function add_order_details($shopping_cart)
    {
        foreach ($shopping_cart->shopping_cart_details as $key => $abc) {
            $this->update_stock($shopping_cart->shopping_cart_details[$key]->product_id, $shopping_cart->shopping_cart_details[$key]->quantity);
            $results[] = array(

                "quantity" => $shopping_cart->shopping_cart_details[$key]->quantity,
                "price" => $abc->product->sell_price,
                "product_id" => $shopping_cart->shopping_cart_details[$key]->product_id
            );
        }

        $this->order_details()->createMany($results);
    }
    public function shipping_status()
    {
        switch ($this->shipping_status) {
            case 'PENDING':
                return 'PENDIENTE';
            case 'APPROVED':
                return 'APROBADO';
            case 'CANCELED':
                return 'CANCELADO';
            case 'DELIVERED':
                return 'ENTREGADO';
            default:
                # code...
                break;
        }
    }

}
