<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLikesProduct;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Retorna los favoritos del usuario autenticado.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $favorites = UserLikesProduct::where('user_id', $user->id)
            ->with('product') // Cargar detalles del producto
            ->get();

        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'No tienes productos favoritos'], 200);
        }

        return response()->json($favorites, 200);
    }

    /**
     * Almacena un producto como favorito para el usuario autenticado.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $favorite = UserLikesProduct::firstOrCreate([
            'user_id'    => $user->id,
            'product_id' => $validatedData['product_id'],
        ]);

        return response()->json([
            'message' => 'Producto agregado a favoritos',
            'favorite' => $favorite,
        ], 201);
    }

    /**
     * Elimina un favorito (verifica que pertenezca al usuario).
     */
    public function destroy(Request $request, UserLikesProduct $favorite)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        if ($favorite->user_id !== $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favorito eliminado correctamente'], 200);
    }

    /**
     * Obtener los favoritos de un usuario específico (sin autenticación).
     */
    public function getFavoritesByUserId($user_id)
    {
        $favorites = UserLikesProduct::where('user_id', $user_id)
            ->with('product') // Cargar detalles del producto
            ->get();

        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'Este usuario no tiene productos favoritos'], 200);
        }

        return response()->json($favorites, 200);
    }

    /**
     * Eliminar un favorito de un usuario específico (sin autenticación).
     */
    public function removeFavoriteByUserId($user_id, $product_id)
    {
        $favorite = UserLikesProduct::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if (!$favorite) {
            return response()->json(['message' => 'Este producto no está en favoritos'], 404);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favorito eliminado correctamente'], 200);
    }
}
