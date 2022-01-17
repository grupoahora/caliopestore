<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class Sale extends Model
{
    protected $guarded = [
        /* 'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status', */
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
    public function update_stock($id, $quantity)
    {
        $product = Product::find($id);
        $product->substract_stock($quantity);
    }
    public function my_store($request)
    {
        
        $sale = self::create($request->all() + [
            'user_id' => Auth::user()->id,
            'sale_date' => Carbon::now('America/Lima'),
        ]);
        $sale->add_sale_details($request);
    }
    public function add_sale_details($request)
    {
        foreach ($request->product_id as $key => $product) {
            $this->update_stock($request->product_id[$key], $request->quantity[$key]);
            $results[] = array("product_id" => $request->product_id[$key], "quantity" => $request->quantity[$key], "price" => $request->price[$key], "discount" => $request->discount[$key]);
        }
        $this->saleDetails()->createMany($results);
        # code...
    }
        /* dd($sale); */

    
}
