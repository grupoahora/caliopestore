<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Database\Factories\ColorFactory;

class Color extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ColorFactory::new();
    }
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function my_store($request)
    {
        $color = self::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),
        ]);
        $this->upload_files($request, $color);
    }
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name, '_'),
        ]);
    }
    public function upload_files($request, $color)
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
        $color->images()->createMany($urlimages);
    }
}
