<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\JsonResponse;

class AssociationController extends Controller
{
    public function index(): JsonResponse
    {
        $associations = Association::all(); // Obtener todas las asociaciones
        return response()->json($associations);
    }
}
