<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'slug',
        'stock',
        'sell_price',
        'status',
        'subcategory_id',
        'provider_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function my_store($request)
    {
        self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'stock' => $request->stock,
            'sell_price' => $request->sell_price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);
    }
    public function my_update($request)
    {
        $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'stock' => $request->stock,
            'sell_price' => $request->sell_price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);
    }
}
