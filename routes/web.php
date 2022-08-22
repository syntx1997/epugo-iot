<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');
