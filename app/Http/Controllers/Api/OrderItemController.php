<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderContainsProduct;

class OrderItemController extends Controller
{
    // Actualiza la cantidad de un item del carrito
    public function update(Request $request, OrderContainsProduct $orderItem)
    {
        $user = $request->user();
        if ($orderItem->order->user_id !== $user->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $orderItem->update($validated);
        return response()->json($orderItem, 200);
    }

    // Elimina un item del carrito
    public function destroy(Request $request, OrderContainsProduct $orderItem)
    {
        $user = $request->user();
        if ($orderItem->order->user_id !== $user->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }
        $orderItem->delete();
        return response()->json(['message' => 'Item eliminado correctamente'], 200);
    }
}
