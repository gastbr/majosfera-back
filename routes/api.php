<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AssociationController;
use App\Http\Controllers\Api\AssociationPhoneController;

Route::get('/user', function (Request $request): mixed {
    dd('hola2');
    //return $request->user(); 
});

Route::group(['as' => 'api.'], function () {
    // Orion resource routes
    Orion::resource('users', UserController::class);
    Orion::resource('products', ProductController::class);
    Orion::resource('categories', CategoryController::class);
    Orion::resource('associations', AssociationController::class);
    Orion::resource('association-phones', AssociationPhoneController::class);
});
