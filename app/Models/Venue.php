<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking; // Import the Booking model

class Venue extends Model
{
    use HasFactory;

    protected $table = "venues";
    protected $fillable = ['venue_title', 'venue_description', 'venue_location', 'venue_image', 'venue_price'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('venue_title', 'like', '%' . request('search') . '%')
                ->orWhere('venue_description', 'like', '%' . request('search') . '%')
                ->orWhere('venue_location', 'like', '%' . request('search') . '%');
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Define the relationship with bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
