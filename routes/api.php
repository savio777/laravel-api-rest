<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'Bem-vindo à API!']);
});

// Route::get('/users', [UserController::class, 'index']);
Route::apiResource('users', UserController::class);
