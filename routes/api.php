<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'Bem-vindo à API!']);
});

Route::get('/users', function (Request $request) {
    $users = User::all();

    return response()->json([
        'data' => $users,
        'message' => 'Lista de usuários recuperada com sucesso.',
        'length' => count($users),
    ]);
});
