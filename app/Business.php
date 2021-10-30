<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
    'description',
    'logo',
    'mail',
    'address',
    'ruc',
    'phone',
    'latitude',
    'length',
    'contact_text',
    'hours_of_operation',
    'google_maps_link',
    ];
   
}
