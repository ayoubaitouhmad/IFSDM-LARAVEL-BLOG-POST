<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Policies\ArticlePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\AssignOp\Mod;


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
        Model::unguard();
        Paginator::defaultView('pagination::tailwind');
        // TODO : @SaadEnne remove this after you implement auth system
        Auth::login(User::query()->first());
//        Auth::logout();
        if (Auth::check()) {
            View::share(['currentUser' => Auth::user()]);
        }
        Gate::policy(Article::class, ArticlePolicy::class);
    }
}
