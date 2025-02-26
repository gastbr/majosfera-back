<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AssociationController;
use App\Http\Controllers\Api\AssociationPhoneController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\JWTAuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;

use Illuminate\Support\Facades\Auth;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(Auth::user());
});

Route::group(['as' => 'api.'], function () {
    // Orion resource routes
    Orion::resource('users', UserController::class);
    Orion::resource('products', ProductController::class);
    Orion::resource('categories', CategoryController::class);
    Orion::resource('associations', AssociationController::class);
    Orion::resource('association-phones', AssociationPhoneController::class);
    Orion::resource('contact-messages', ContactController::class);
    Orion::resource('favorites', FavoriteController::class);
});


Route::post('/login', [JWTAuthController::class, 'login']);
Route::post('/register', [JWTAuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [JWTAuthController::class, 'logout']);
    Route::put('/user', [JWTAuthController::class, 'update']);
});

Route::group(['middleware' => 'auth:api', 'as' => 'api.'], function () {
    // Obtiene el pedido pendiente (carrito) del usuario autenticado
    Route::get('/orders', [OrderController::class, 'index']);
    Route::delete('/orders/{order}/products/{product}', [OrderController::class, 'removeProduct']);

    // Actualiza y elimina items del pedido (carrito)
    Route::put('/order-items/{orderItem}', [OrderItemController::class, 'update']);
    Route::delete('/order-items/{orderItem}', [OrderItemController::class, 'destroy']);
});
