<?php

use App\Http\Controllers\HandleCallback;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(HandleCallback::class)->group(function () {
    Route::post('/callback', 'callback');
});