<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\UserController;

Route::group(['as' => 'api.'], function () {
    // Orion resource routes
    Orion::resource('users', UserController::class);
    Orion::resource('products', ProductController::class);
});
