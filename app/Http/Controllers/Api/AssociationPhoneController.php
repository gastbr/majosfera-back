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
    public function index(Request $request): JsonResponse
    {
        try {
            // Verifica si se pasó 'association_id' en la solicitud
            if ($request->has('association_id')) {
                $phones = AssociationPhone::where('association_id', $request->association_id)->get();
            } else {
                $phones = AssociationPhone::all();
            }

            // Verifica si hay resultados
            if ($phones->isEmpty()) {
                return response()->json(['message' => 'No se encontraron teléfonos para esta asociación.'], 404);
            }

            return response()->json($phones, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la consulta', 'message' => $e->getMessage()], 500);
        }
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
        return response()->json($phone, 200);
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
            'phone' => 'sometimes|string|unique:association_phones,phone,' . $id,
            'description' => 'nullable|string',
        ]);

        $phone->update($validated);

        return response()->json($phone, 200);
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
        return response()->json(['message' => 'Teléfono eliminado correctamente'], 200);
    }
}
