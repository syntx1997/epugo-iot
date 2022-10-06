<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\QuailController;
use App\Http\Controllers\EggController;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/room', [DashboardController::class, 'room']);
    Route::get('/quail', [DashboardController::class, 'quail']);
    Route::get('/count-egg', [DashboardController::class, 'count_egg']);
    Route::get('/collect-egg', [DashboardController::class, 'collect_egg']);
    Route::get('/api', [DashboardController::class, 'api']);
    Route::get('/temperature', [DashboardController::class, 'temperature']);
    Route::get('/sound', [DashboardController::class, 'sound']);
    Route::get('/summary', [DashboardController::class, 'summary']);
    Route::get('/settings', [DashboardController::class, 'settings']);
});

Route::prefix('/func')->group(function () {

    Route::prefix('/auth')->group(function (){
        Route::post('/login', [UserController::class, 'login']);
        Route::get('/logout', [UserController::class, 'logout']);
    });

    Route::prefix('room')->group(function () {
        Route::get('get-all', [RoomController::class, 'get_all']);
        Route::get('generate-room-no', [RoomController::class, 'generate_room_no']);
        Route::post('add', [RoomController::class, 'add']);
        Route::post('edit', [RoomController::class, 'edit']);
    });

    Route::prefix('/quail')->group(function () {
        Route::get('/get-all', [QuailController::class, 'get_all']);
        Route::post('/add', [QuailController::class, 'add']);
    });

    Route::prefix('/egg')->group(function () {
        Route::get('/get-all', [EggController::class, 'get_all']);
    });

});
