<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/temperature/{temperature}/{lightStatus}', [APIController::class, 'temperature']);
Route::get('/sound/{decibel}/{musicStatus}', [APIController::class, 'sound']);
Route::get('/temperature/get-all', [APIController::class, 'get_all_temperature']);
Route::get('temperature/sound/{temperature}/{lightStatus}/{decibel}/{musicStatus}', [APIController::class, 'TemperatureSound']);
Route::get('/sound/get-all', [APIController::class, 'get_all_sound']);
