<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController as ApiTaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/tasks', ApiTaskController::class);

Route::post("/Login",[LoginController::class,"Login"]);
Route::post("/Logout",[LoginController::class,"Logout"]);