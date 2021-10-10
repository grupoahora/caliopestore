<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'ruc',
        'address',
        'phone',
        'email',
    ];
    public function Sales()
    {
        return $this->hasMany(Sale::class);
    }
}
