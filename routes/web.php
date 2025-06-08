<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::name('articles.')->prefix('articles')
        ->controller(ArticleController::class)->group(function () {

            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::post('delete', 'destroyGroup')->name('destroyGroup');
            Route::get('{role}/delete', 'destroy')->name('destroy');
            Route::get('{role}/show', 'show')->name('show');
            Route::post('{role}/update', 'update')->name('update');

        });
});
