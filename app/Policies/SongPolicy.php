<?php

namespace App\Policies;

use App\Models\Song;
use App\Models\User;

class SongPolicy
{
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Song $song): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Song $song): bool
    {
        return $user->is_admin;
    }
}