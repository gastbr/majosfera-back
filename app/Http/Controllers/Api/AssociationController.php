<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AssociationController extends Controller
{
    /**
     * Obtener todas las asociaciones.
     */
    public function index(): JsonResponse
    {
        $associations = Association::all();
        return response()->json($associations);
    }

    /**
     * Obtener una asociación específica por ID.
     */
    public function show($id): JsonResponse
    {
        $association = Association::find($id);

        if (!$association) {
            return response()->json(['message' => 'Asociación no encontrada'], 404);
        }

        return response()->json($association);
    }

    /**
     * Crear una nueva asociación.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tax_id' => 'required|string|unique:associations,tax_id|max:50',
            'business_name' => 'required|string|unique:associations,business_name|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:associations,email|max:255',
        ]);

        $association = Association::create($validated);

        return response()->json($association, 201);
    }

    /**
     * Actualizar una asociación.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $association = Association::find($id);

        if (!$association) {
            return response()->json(['message' => 'Asociación no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'tax_id' => 'sometimes|string|unique:associations,tax_id,' . $id . '|max:50',
            'business_name' => 'sometimes|string|unique:associations,business_name,' . $id . '|max:255',
            'address' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:associations,email,' . $id . '|max:255',
        ]);

        $association->update($validated);

        return response()->json($association);
    }

    /**
     * Eliminar una asociación.
     */
    public function destroy($id): JsonResponse
    {
        $association = Association::find($id);

        if (!$association) {
            return response()->json(['message' => 'Asociación no encontrada'], 404);
        }

        $association->delete();
        return response()->json(['message' => 'Asociación eliminada correctamente']);
    }
}
