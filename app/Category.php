<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    protected $fillable = [
        'name', 'description', 'slug', 'icon', 'id'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function my_store($request){
        $category = self::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),
            'icon' => $request->icon,
        ]);
        $this->upload_files($request, $category);
    }
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),
            'icon' => $request->icon,
        ]);
    }


    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    public function upload_files($request, $category)
    {
        $urlimages = [];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $nombre = time() . $image->getClientOriginalName();
                $ruta = public_path() . '/image';
                $image->move($ruta, $nombre);
                $urlimages[]['url'] = '/image/' . $nombre;
            }
        }
        $category->images()->createMany($urlimages);
    }
    static function get_active_products()
    {
        return self::where('status', 'ACTIVE');
    }
}
