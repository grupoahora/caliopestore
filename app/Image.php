<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImageFactory;

class Image extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ImageFactory::new();
    }

    protected $fillable = [
        'url',
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
}
