<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = "venues";
    protected $fillable =['venue_title','venue_description', 'venue_location','venue_image'];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('venue_title', 'like', '%' . request('search') . '%')
                ->orWhere('venue_description', 'like', '%' . request('search') . '%')
                ->orWhere('venue_location', 'like', '%' . request('search') . '%');
        }
    }
}