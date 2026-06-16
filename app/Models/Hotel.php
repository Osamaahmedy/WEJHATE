<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'price_per_night',
        'image',
        'rating',
        'rooms_available',
    ];

    public function bookings()
    {
        return $this->hasMany(HotelBooking::class);
    }
}
