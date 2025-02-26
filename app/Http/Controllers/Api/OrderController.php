<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Devuelve el pedido pendiente del usuario autenticado
    public function index(Request $request)
    {
        $user = $request->user();
        $order = Order::with('products')  // Eager loading de productos
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'order_date' => now(),
                'total' => 0,
                'status' => 'pending',
            ]);
        }
        return response()->json($order, 200);
    }

    public function removeProduct($orderId, $productId)
    {
        $order = Order::with('products')->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        // Verifica si el producto está en el pedido
        $product = $order->products()->where('product_id', $productId)->first();

        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado en el pedido'], 404);
        }

        // Eliminar la relación en la tabla pivot
        $order->products()->detach($productId);

        // Recalcular el total del pedido
        $order->total = $order->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });

        $order->save();

        return response()->json(['message' => 'Producto eliminado del pedido', 'order' => $order]);
    }
}
