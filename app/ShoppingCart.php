<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'order_date',
    ];
    public function shopping_cart_details()
    {
        return $this->hasMany(ShoppingCartDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
