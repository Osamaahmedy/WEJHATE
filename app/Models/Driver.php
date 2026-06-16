<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'car_model',
        'license_plate',
        'avatar',
        'rating',
        'status',
    ];

    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
}
