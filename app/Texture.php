<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texture extends Model
{
    protected $fillable = [
        'url',
    ];
    public function textureable()
    {
        return $this->morphTo();
    }
}
