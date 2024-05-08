<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
        'method',
        'code',
        'addr',
        'building',
    ];
}
