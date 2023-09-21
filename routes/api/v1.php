<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\TurbineComponentController;
use App\Http\Controllers\Api\v1\TurbineController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/turbines', [TurbineController::class, 'index']);
    Route::post('/turbines', [TurbineController::class, 'store']);
    Route::get('/turbines/{id}', [TurbineController::class, 'show']);
    Route::put('/turbines/{id}', [TurbineController::class, 'update']);
    Route::delete('/turbines/{id}', [TurbineController::class, 'destroy']);

    Route::get('/turbines/{turbineId}/components', [TurbineComponentController::class, 'index']);
});
