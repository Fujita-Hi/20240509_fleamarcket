<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'uuid', 'user_id');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item', 'id', 'item_id');
    }
}
