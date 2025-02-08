<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Facades\DB;
use Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory, Rateable;

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    protected $guarded = [

    ];

    public function add_stock($quantity)
    {
        return $this->increment('stock', $quantity);


    }
    public function substract_stock($quantity)
    {
        return $this->decrement('stock', $quantity);

    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function textures()
    {
        return $this->morphMany('App\Texture', 'textureable');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
    public function saleDetails()
    {
        return $this->hasMany(saleDetail::class);
    }
    public function my_store($request)
    {
        $product = self::create($request->all()+[
            'slug' => Str::slug($request->name, '_'),
        ]);
        $product->tags()->attach($request->get('tags'));
        $product->colors()->attach($request->get('colors'));
        $product->sizes()->attach($request->get('sizes'));
        $this->generate_code($product);
        $this->upload_files($request, $product);
        return $product;
    }
    public function my_update($request)
    {
        $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sell_price' => $request->sell_price,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
        $this->tags()->sync($request->get('tags'));
        $this->colors()->sync($request->get('colors'));
        $this->sizes()->sync($request->get('sizes'));
        $this->generate_code($this);
    }
    public function generate_code($product)
    {
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCeros]);
    }
    public function upload_files($request, $product)
    {
        $urlimages = [];
        if($request->hasFile('images')){
            $images = $request->file('images')->size('2500');
            foreach ($images as $image) {
                $nombre = time().$image->getClientOriginalName();
                $ruta = public_path().'/image';
                $image->move($ruta, $nombre);
                $urlimages[]['url']='/image/'.$nombre;
            }
        }
        $product->images()->createMany($urlimages);
    }
    static function get_active_products()
    {
        return self::where('status', 'BOTH')->orWhere('status', 'SHOP');
    }
    static function get_rating_products()
    {
        return self::where('status', 'BOTH');
    }
    public function product_status()
    {
        switch ($this->shipping_status) {
            case 'DRAFT':
                return 'BORRADOR';
            case 'SHOP':
                return 'TIENDA';
            case 'POS':
                return 'PUNTO DE VENTA';
            case 'BOTH':
                return 'AMBOS';
            case 'DISABLED':
                return 'DESACTIVADO';
            default:
                # code...
                break;
        }
    }
}
