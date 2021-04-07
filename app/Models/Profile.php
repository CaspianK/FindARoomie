<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'birthdate',
        'gender',
        'profile_picture',
        'bio',
        'instagram',
        'spotify',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->hasOne(Room::class);
    }
}
