<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user) {
            return $user->status === "admin";
        });
        Gate::define('user', function(User $user) {
            return $user->status === "user";
        });
        Gate::define('pelamar', function(User $user) {
            return $user->status === "pelamar";
        });
        Gate::define('pengasuh', function(User $user) {
            return $user->status === "Pengasuh";
        });

        Paginator::useBootstrap();
    }
}