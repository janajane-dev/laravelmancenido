<?php

namespace App\Providers;

use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Gate demo (Episode 17). Ito ang naunang paraan bago nagpalit sa Policy sa Episode 18.
        // Ang actual na ginagamit sa SongController ay ang SongPolicy sa taas.
        Gate::define('update-song', function (User $user, Song $song) {
            return $user->is_admin;
        });
    }
}