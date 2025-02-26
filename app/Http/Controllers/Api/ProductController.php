<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    protected $model = Product::class;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->model::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'association_id' => 'required|integer|exists:associations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image_url' => 'nullable|string|url',
            'image' => 'nullable|image|max:2048', // Permitir subida de imagen
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        // Manejar imagen subida desde el dispositivo
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image_path'] = "/storage/" . $path; // Guardamos en storage
        }

        // Si no se subió una imagen y tampoco se proporcionó una URL, usar la imagen por defecto
        if (!isset($validatedData['image_path']) && empty($validatedData['image_url'])) {
            $validatedData['image_path'] = "/noPhoto.jpg"; // La imagen debe estar en `public/noPhoto.jpg`
        }

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'association_id' => 'sometimes|required|integer|exists:associations,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'image_url' => 'nullable|string|url',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        // Si se sube una nueva imagen, eliminar la anterior y guardar la nueva
        if ($request->hasFile('image')) {
            if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
            }
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image_url'] = "/storage/" . $path;
        }

        // Si no hay nueva imagen, mantener la existente
        $product->update($validatedData);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Eliminar imagen si existe en storage
        if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
        }

        $product->delete();

        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }
}
