<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
    /* public function shoppingcarts()
    {
        return $this->hasMany(ShoppingCart::class);
    } */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function update_client($request)
    {
        
        $this->update($request->all());
        $this->profile()->update([
            'dni'=>$request->dni,
            'ruc'=>$request->ruc,
        ]);
    }

    public function getAvatarAttribute()
    {
        $email = md5($this->email);
        return "https://i.pravatar.cc/150?u=/$email";
    }
}
