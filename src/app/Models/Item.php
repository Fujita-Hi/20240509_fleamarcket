<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'price',
        'category',
        'description',
        'condition',
        'img'
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'item_id', 'id');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite', 'item_id', 'id');
    }

    public function histories(){
        return $this->hasMany('App\Models\History', 'item_id', 'id');
    }

    public function sells(){
        return $this->hasMany('App\Models\Sell', 'item_id', 'id');
    }

}
