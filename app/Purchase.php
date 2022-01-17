<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Purchase extends Model
{
    protected $fillable = [
        'provider_id',
        'user_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture',
    ];

    public function update_stock($id, $quantity)
    {
        $product = Product::find($id);
        $product->add_stock($quantity);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }
    public function my_store($request)
    {
        $purchase = self::create($request->all() + [
            'user_id' => Auth::user()->id,
            'purchase_date' => Carbon::now('America/Lima'),
        ]);
        $purchase->add_purchase_details($request, $purchase);
    }
    public function add_purchase_details($request, $purchase)
    {
        foreach ($request->product_id as $key => $id) {
            $this->update_stock($request->product_id[$key], $request->quantity[$key]);
            $results[] = array("product_id" => $request->product_id[$key], "quantity" => $request->quantity[$key], "price" => $request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);
        
    }
    
}
