<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AssociationPhone;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AssociationPhoneController extends Controller
{
    /**
     * Obtener todos los teléfonos de asociaciones.
     */
    public function index(): JsonResponse
    {
        $phones = AssociationPhone::all();
        return response()->json($phones);
    }

    /**
     * Obtener un teléfono específico por ID.
     */
    public function show($id): JsonResponse
    {
        $phone = AssociationPhone::find($id);
        if (!$phone) {
            return response()->json(['message' => 'Teléfono no encontrado'], 404);
        }
        return response()->json($phone);
    }

    /**
     * Guardar un nuevo teléfono de asociación.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'association_id' => 'required|exists:associations,id',
            'phone' => 'required|string|unique:association_phones',
            'description' => 'nullable|string',
        ]);

        $phone = AssociationPhone::create($validated);

        return response()->json($phone, 201);
    }

    /**
     * Actualizar un teléfono de asociación.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $phone = AssociationPhone::find($id);
        if (!$phone) {
            return response()->json(['message' => 'Teléfono no encontrado'], 404);
        }

        $validated = $request->validate([
            'association_id' => 'sometimes|exists:associations,id',
            'phone' => 'sometimes|string|unique:association_phones,phone,' . $id,
            'description' => 'nullable|string',
        ]);

        $phone->update($validated);

        return response()->json($phone);
    }

    /**
     * Eliminar un teléfono de asociación.
     */
    public function destroy($id): JsonResponse
    {
        $phone = AssociationPhone::find($id);
        if (!$phone) {
            return response()->json(['message' => 'Teléfono no encontrado'], 404);
        }

        $phone->delete();
        return response()->json(['message' => 'Teléfono eliminado correctamente']);
    }
}
