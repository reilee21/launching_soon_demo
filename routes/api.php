<?php

use App\Http\Controllers\Api\LogsController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\SignupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/contacts', [SignupController::class, 'storeContact']);

// Stats endpoints
Route::get('/stats', [StatsController::class, 'index']);
Route::get('/stats/trends', [StatsController::class, 'trends']);

// Logs endpoints
Route::get('/logs/recent', [LogsController::class, 'recent']);
Route::get('/logs', [LogsController::class, 'index']);
