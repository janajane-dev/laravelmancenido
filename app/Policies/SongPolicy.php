<?php

namespace App\Policies;

use App\Models\Song;
use App\Models\User;

class SongPolicy
{
    public function update(User $user, Song $song): bool
    {
        return $user->id === $song->user_id;
    }

    public function delete(User $user, Song $song): bool
    {
        return $user->id === $song->user_id;
    }
}