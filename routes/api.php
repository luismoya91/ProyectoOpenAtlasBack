<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FeeController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\TaskController;

Route::group(['prefix' => 'user'], function () {
    Route::post('register', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () { 
    Route::resource('status', StatusController::class);
    Route::resource('fees', FeeController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::get('projects/user/{user}',[ProjectController::class, 'listByUser']);
    Route::post('user/logout',[AuthController::class, 'logout']);
});
