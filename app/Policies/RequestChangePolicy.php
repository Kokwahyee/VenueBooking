<?php

namespace App\Policies;

use App\Models\RequestChange;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestChangePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, RequestChange $requestChange)
    {
        return $user->id === $requestChange->booking->user_id;
    }

    public function update(User $user, RequestChange $requestChange)
    {
        return $user->id === $requestChange->booking->user_id;
    }
}