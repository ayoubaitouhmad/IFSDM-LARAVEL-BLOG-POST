<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Authenticated\User\Articles\UserArticleController;
use App\Http\Controllers\Authenticated\User\Articles\UserProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('articles.')->prefix('articles')
    ->controller(ArticleController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('search', 'search')->name('search');
        Route::get('{id}/{username?}/{title?}', 'show')->name('show');
    });

Route::name('author.')->prefix('@{username}')
    ->controller(UserArticleController::class)->group(function () {
        Route::get('articles', 'index')->name('articles');
    });




Route::middleware('auth')->group(callback: function () {
    Route::name('user.')->prefix('@me')
        ->group(function () {
            Route::resource('articles', UserArticleController::class);
            Route::controller(UserProfileController::class)->name('profile.')->group(function () {
                Route::get('profile', 'index')->name('index');
                Route::put('edit', 'edit')->name('edit');
            });

        });

});
