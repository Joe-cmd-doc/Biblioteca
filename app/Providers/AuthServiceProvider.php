<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Review;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('is_admin', function ($user) {
            return $user->is_admin === 1;
        });

        Gate::define('edit-review', function ($user, Review $review) {
            return $user->id === $review->user_id || $user->is_admin;
        });
    }
}
