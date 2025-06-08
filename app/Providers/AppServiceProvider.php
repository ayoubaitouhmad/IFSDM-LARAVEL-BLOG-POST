<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::tailwind');
        // TODO : @SaadEnne remove this after you implement auth system
        Auth::login(User::query()->first());
        if (Auth::check()) {
            View::share(['currentUser' => Auth::user()]);
        }
    }
}
