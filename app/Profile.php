<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'surname',
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
