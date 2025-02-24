<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLikesProduct;

class FavoriteController extends Controller
{
    /**
     * Retorna los favoritos del usuario autenticado.
     */
    public function index(Request $request)
    {
        $favorites = UserLikesProduct::where('user_id', $request->user()->id)
            ->with('product') // Opcional: para traer los detalles del producto
            ->get();

        return response()->json($favorites, 200);
    }

    /**
     * Almacena un producto como favorito para el usuario autenticado.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        // Crea el favorito o lo retorna si ya existe
        $favorite = UserLikesProduct::firstOrCreate([
            'user_id'    => $request->user()->id,
            'product_id' => $validatedData['product_id'],
        ]);

        return response()->json($favorite, 201);
    }

    /**
     * Elimina un favorito (verifica que pertenezca al usuario).
     */
    public function destroy(Request $request, UserLikesProduct $favorite)
    {
        if ($favorite->user_id !== $request->user()->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favorito eliminado correctamente'], 200);
    }
}
