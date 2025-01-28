<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return response()->json(
        [
            "Status" => "Ok",
            "Message" => "Bem vindo a minha api sua delícia"
        ], 200
    );
});

Route::apiResource('users', UserController::class);