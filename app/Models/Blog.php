<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Blog extends Model
{
    use HasFactory , Searchable;
    protected $fillable = ['title', 'author', 'publish_date', 'image' ,  'description'];


function getshortdescription(){
    return Str::words($this->description ,30 , '....');
}


}
