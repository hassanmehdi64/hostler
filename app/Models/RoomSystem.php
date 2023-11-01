<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSystem extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'num',
        'image',
        'hostels_id'
    ];
}
