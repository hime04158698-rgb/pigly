<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;

Route::middleware(['auth'])->group(function () {
    Route::get('/weight_logs', [WeightController::class, 'index']);
    Route::get('/weight_logs/create', [WeightController::class, 'create']);
    Route::post('/weight_logs', [WeightController::class, 'store']);

    Route::get('/weight_logs/goal_setting', [WeightController::class, 'goalSetting']);
    Route::put('/weight_logs/goal_setting', [WeightController::class, 'updateGoal']);

    Route::get('/weight_logs/{weightLog}/edit', [WeightController::class, 'edit']);
    Route::put('/weight_logs/{weightLog}', [WeightController::class, 'update']);
    Route::delete('/weight_logs/{weightLog}', [WeightController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome');
});
