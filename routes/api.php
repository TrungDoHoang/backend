<?php

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    //Passport -> access token + refresh token
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [Auth\AuthController::class, 'login'])->name('auth.login');
    });
});
