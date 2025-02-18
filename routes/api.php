<?php

use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProfileController;

Route::group(['as' => 'api.'], function () {
    // Orion resource routes
    Orion::resource('users', UserController::class);
    Orion::resource('products', ProfileController::class);
});
