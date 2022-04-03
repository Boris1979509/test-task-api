<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth',
], static function () {
    /**
     * /api/auth/login
     * /api/auth/register
     * /api/auth/logout
     */
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::delete('logout', [LoginController::class, 'logout']);
});

/** Get user data */
Route::get('user', UserController::class);
