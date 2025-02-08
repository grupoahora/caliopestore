<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\SocialMediaFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return SocialMediaFactory::new();
    }

    protected $fillable = [
        'url',
        'name',
        'icon',
        'business_id',
    ];
}
