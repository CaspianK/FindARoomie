<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'city_id',
        'title',
        'address',
        'description',
    ];

    public function bookmark() {
        return $this->hasMany(Bookmark::class);
    }

    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    public function photo() {
        return $this->hasMany(Photo::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
