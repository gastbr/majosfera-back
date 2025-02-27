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

// Devuelve el usuario autenticado con JWT
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(Auth::user());
});

// Rutas públicas
Route::post('/login', [JWTAuthController::class, 'login']);
Route::post('/register', [JWTAuthController::class, 'register']);

// Rutas de Orion (gestionadas sin policies automáticamente)
Route::group(['as' => 'api.'], function () {
    Orion::resource('users', UserController::class);
    Orion::resource('products', ProductController::class);
    Orion::resource('categories', CategoryController::class);
    Orion::resource('associations', AssociationController::class);
    Orion::resource('association-phones', AssociationPhoneController::class);
    Orion::resource('contact-messages', ContactController::class);
    // Orion::resource('favorites', FavoriteController::class);
});



// Rutas protegidas con autenticación
Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout', [JWTAuthController::class, 'logout']);
    Route::put('/user', [JWTAuthController::class, 'update']);

    // Rutas solo para admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

    // Rutas para admin y gestores
    Route::middleware('role:gestor')->group(function () {
        Route::get('/manage-associations', [AssociationController::class, 'index']);
    });

    // Gestión de pedidos (carrito) - Usuarios autenticados
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::delete('/{order}/products/{product}', [OrderController::class, 'removeProduct']);
    });

    // Gestión de items en el carrito - Usuarios autenticados
    Route::prefix('order-items')->group(function () {
        Route::put('/{orderItem}', [OrderItemController::class, 'update']);
        Route::delete('/{orderItem}', [OrderItemController::class, 'destroy']);
    });



    // ✅ Permitir obtener favoritos de cualquier usuario por ID
    Route::middleware(['auth:api'])->get('/favorites/{user_id}', [FavoriteController::class, 'getFavoritesByUserId']);


    // ✅ Permitir eliminar favoritos de un usuario por ID y producto
    Route::delete('/favorites/{user_id}/{product_id}', [FavoriteController::class, 'removeFavoriteByUserId']);
});
