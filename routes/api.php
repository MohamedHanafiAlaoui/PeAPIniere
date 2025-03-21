<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

 
Route::group([
    'middleware' => 'api',
  
], function ($router) {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [UserController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [UserController::class, 'me'])->middleware('auth:api')->name('me');
});




Route::get('/users', [UserController::class, 'index']);