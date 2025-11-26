<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-review', function (User $user, Review $review) {
           return $user->is_admin OR $user->id === $review->user_id;
        });

        Gate::define('edit-review', function (User $user, Review $review) {
            return $user->is_admin OR $user->id === $review->user_id;
        });

    }
}
