<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');

Route::prefix('/func')->group(function () {
    Route::prefix('/auth')->group(function (){
        Route::post('/login', [UserController::class, 'login']);
        Route::get('/logout', [UserController::class, 'logout']);
    });
});
