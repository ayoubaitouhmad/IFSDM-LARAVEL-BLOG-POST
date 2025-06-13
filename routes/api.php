<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

// Auth routes with specific rate limiting
Route::middleware('throttle:6,1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', static fn(Request $r) => $r->user());
});
