<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestChange extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'type', 'reason', 'file_path', 'request_status'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function requestComments()
    {
        return $this->hasMany(RequestComment::class);
    }
}