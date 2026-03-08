<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(OrderController::class)->group(function () {
    Route::post('/payment/notification', 'notification');
});