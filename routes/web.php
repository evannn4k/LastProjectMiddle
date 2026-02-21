<?php

// admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;

// authentication
use App\Http\Controllers\Auth\AuthController;

// user
use App\Http\Controllers\User\LandingPageController;

use Illuminate\Support\Facades\Route;

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'formLoginPage')->name('login')->middleware('guest');
    Route::get('/register', 'formRegisterPage')->name('register')->middleware('guest');
    
    Route::post('/verify', 'verify')->name('verify');
    Route::post('/register', 'register')->name('register');

    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth:admin')
->prefix("/admin")
->name("admin.")
->group(function () {
    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");

    Route::resource('game', GameController::class);
});