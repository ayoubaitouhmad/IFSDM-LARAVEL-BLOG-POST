<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', static fn(\Illuminate\Http\Request $r) => $r->user());
});
