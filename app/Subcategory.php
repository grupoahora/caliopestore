<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Database\Factories\SubcategoryFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return SubcategoryFactory::new();
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function my_store($request)
    {
        $subcategory = self::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),
            'category_id' => $request->category_id,
        ]);
        $this->upload_files($request, $subcategory);
    }
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),

        ]);
    }

    public function upload_files($request, $subcategory)
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
        $subcategory->images()->createMany($urlimages);
    }
}
