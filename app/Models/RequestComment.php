<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestComment extends Model
{
    protected $fillable = ['user_id', 'request_change_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestChange()
    {
        return $this->belongsTo(RequestChange::class);
    }
}

