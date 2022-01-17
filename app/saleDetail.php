<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saleDetail extends Model
{
    protected $guarded = [
        /* 'sale_id',
        'product_id',
        'quantity',
        'price',
        'discount', */
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
