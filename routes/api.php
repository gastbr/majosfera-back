<?php

use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;

Route::group(['as' => 'api.'], function () {
    // Orion resource routes
    Orion::resource('users', UserController::class);

    // Custom API routes
    Route::get('custom-endpoint', function () {
        return response()->json(['message' => 'This is a custom API endpoint']);
    });
});

Route::middleware('auth:sanctum')->get('/products', [ProfileController::class, 'index']);
