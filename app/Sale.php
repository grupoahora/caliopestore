<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
    public function saleDetails(){
        return $this->hasMany(saleDetail::class);
    }

    public static function store_products()
    {
        $sales = Sale::where('status', 'VALID')->get();
        $sale_details = new saleDetail;
        foreach ($sales as $key => $value) {
            # code...
            $sale_details = saleDetail::where('sale_id', $value->id)->get();
        }
        return $sale_details;
    }
}
