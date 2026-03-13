<?php

// admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\MembershipController as AdminMembership;
use App\Http\Controllers\Admin\MessageController as AdminMessage;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\CheckTransactionsController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\MessageController as UserMessage;
use Illuminate\Support\Facades\Route;

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/game/{slug}', 'detail')->name('game.detail');
});

Route::controller(UserMessage::class)
    ->group(function () {
        Route::get("/message", "message")->name("message");
        Route::post("/message", "store")->name("message.store")->middleware('throttle:3,1');
    });

Route::controller(OrderController::class)->group(function () {
    Route::post('/order', 'order')->name('order');
});

Route::controller(CheckTransactionsController::class)->group(function () {
    Route::get('/transaction', 'transaction')->name('transaction');
    Route::get('/transaction/detail', 'detail')->name('transaction.detail');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'formLoginPage')->name('login')->middleware('guest');
    Route::get('/register', 'formRegisterPage')->name('register')->middleware('guest');

    Route::post('/verify', 'verify')->name('verify');
    Route::post('/register', 'register')->name('register');

    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth:user')
    ->group(function () {
        Route::controller(HistoryController::class)->group(function () {
            Route::get('/history', 'history')->name('history');
            Route::get('/history/{order}', 'detail')->name('history.detail');
        });
    });

Route::middleware('auth:admin')
    ->prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('membership', AdminMembership::class)->only(['index', 'show', 'store', 'update', 'destroy']);

        Route::resource('game', GameController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
        Route::controller(GameController::class)->group(function () {
            Route::patch("/game/status/{game}/update", "status")->name("game.status");
        });

        Route::resource('category', CategoryController::class);
        Route::controller(CategoryController::class)->group(function () {});

        Route::resource('user', UserController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::controller(UserController::class)->group(function () {});

        Route::resource('product', ProductController::class)->only(['index', 'store', 'update', 'destroy']);

        Route::controller(AdminMessage::class)->group(function () {
            Route::get("/message", "index")->name("message.index");
            Route::patch("/message/read/{message}", "read")->name("message.read");
            Route::patch("/message/read/all", "readAll")->name("message.read.all");
        });

        Route::resource('order', AdminOrder::class)->only(['index', 'show', 'destroy']);
    });
