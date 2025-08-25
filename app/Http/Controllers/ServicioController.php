<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Servicio;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return response()->json(['data' => $servicios], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Not implemented'], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        try {
            $servicio = Servicio::create($validated);
            return response()->json(['data' => $servicio], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el servicio'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['data' => $servicio], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['data' => $servicio], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], Response::HTTP_NOT_FOUND);
        }

        try {
            $servicio->update($validated);
            return response()->json(['data' => $servicio], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el servicio'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], Response::HTTP_NOT_FOUND);
        }

        try {
            $servicio->delete();
            return response()->json(['message' => 'Servicio eliminado'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el servicio'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
