<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TextureFactory;

class Texture extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return TextureFactory::new();
    }

    protected $fillable = [
        'url',
    ];

    public function textureable()
    {
        return $this->morphTo();
    }
}
