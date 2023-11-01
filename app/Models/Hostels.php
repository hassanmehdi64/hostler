<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Hostels extends Model
{
    use HasFactory, Searchable;

    protected $fillable  = [
        "name",
        "location",
        "hostel_manager_name",
        "phone",
        "mobile_number",
        "email",
        "gender",
        "hostel_rent",
        "hostel_image",
        "user_id",
    ];


    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'location' => $this->location,
            'gender' => $this->gender,
            'hostel_image' => $this->hostel_image,
        ];
    }
}
