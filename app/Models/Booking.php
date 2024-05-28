<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Add this line

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = ['venue_id', 'date', 'time_slots', 'user_id', 'total_cost', 'status']; // Corrected 'time' to 'time_slots'

    protected $casts = [
        'time_slots' => 'array', // Ensure time_slots is treated as an array
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}