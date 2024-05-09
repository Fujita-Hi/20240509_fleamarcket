<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profileimg',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function addrs(){
        return $this->hasMany('App\Models\Addr', 'user_id', 'uuid');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'user_id', 'uuid');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite', 'user_id', 'uuid');
    }

    public function histories(){
        return $this->hasMany('App\Models\History', 'user_id', 'uuid');
    }

    public function sells(){
        return $this->hasMany('App\Models\Sell', 'user_id', 'uuid');
    }

}
