<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'stock',
        'short_description',
        'long_description',
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
    public function images()
    {
        return $this->morphToMany('App\Image', 'imageable');
    }
    public function my_store($request)
    {
        $product = self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'stock' => $request->stock,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sell_price' => $request->sell_price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);
        $this->generate_code($product);
    }
    public function my_update($request)
    {
        $product = $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'stock' => $request->stock,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sell_price' => $request->sell_price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
            
        ]);
        $this->generate_code($product);
    }
    public function generate_code($product)
    {
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCeros]);
    }
    
}
