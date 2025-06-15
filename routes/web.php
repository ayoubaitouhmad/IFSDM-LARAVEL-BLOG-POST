<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Authenticated\User\Articles\UserArticleController;
use App\Http\Controllers\Authenticated\User\Articles\UserProfileController;
use App\Http\Controllers\AuthorArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::get('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    auth()->user()?->tokens()?->delete();
    return redirect()->route('login');
})->middleware(['auth' ,'auth:sanctum'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('articles.')->prefix('articles')
    ->controller(ArticleController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}/{username?}/{title?}', 'show')->name('show');
    });

Route::name('author.')
    ->prefix('@{username}')
   ->group(function () {
        Route::get('articles', AuthorArticleController::class)->name('articles');
    });

Route::middleware(['auth' , 'auth:sanctum'])->group(function () {
    Route::name('user.')->prefix('@me')
        ->group(function () {
            Route::resource('articles', UserArticleController::class);
            Route::controller(UserProfileController::class)->name('profile.')->group(function () {
                Route::get('profile', 'index')->name('index');
                Route::put('edit', 'edit')->name('edit');
            });

        });

});





