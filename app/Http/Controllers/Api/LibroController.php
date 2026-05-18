<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LibroController extends Controller

{
    public function index(): JsonResponse{
    $libros = Libro::all();
    return response()->json($libros, 200);
}

public function store(Request $request): JsonResponse
{
    $libro = Libro::create($request->all());
    return response()->json($libro, 201);
}

public function show($id): JsonResponse
{
    $libro = Libro::findOrFail($id);

    if (!$libro) {
        return response()->json([
            'message' => 'Libro no encontrado'
        ], 404);
    }

    return response()->json($libro, 200);
}
public function update(Request $request, $id): JsonResponse
{
    $libro = Libro::findOrFail($id);

    if (!$libro) {
        return response()->json([
            'message' => 'Libro no encontrado'
        ], 404);
    }

    $libro->update($request->all());

    return response()->json($libro, 200);
}

public function destroy($id): JsonResponse
{
    $libro = Libro::findOrFail($id);

    if (!$libro) {
        return response()->json([
            'message' => 'Libro no encontrado'
        ], 404);
    }

    $libro->delete();

    return response()->json([
        'message' => 'Libro eliminado'
    ], 200);
}
    
}
