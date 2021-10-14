<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'dni',
        'ruc',
        'address',
        'phone',
    ];
    public function Sales()
    {
        return $this->hasMany(Sale::class);
    }
}
