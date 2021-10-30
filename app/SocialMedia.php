<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'url',
        'name',
        'icon',
        'business_id',
    ];
}
