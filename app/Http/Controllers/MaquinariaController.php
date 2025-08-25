<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maquinarias = Maquinaria::all();
        return response()->json(['data' => $maquinarias], Response::HTTP_OK);
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
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'chasis'      => 'required|string|max:100',
            'patente'     => 'required|string|max:20',
            'kilometraje' => 'required|integer|min:0',
        ]);
        try {
            $maquinaria = Maquinaria::create($validated);
            return response()->json(['data' => $maquinaria], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la maquinaria'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maquinaria = Maquinaria::find($id);
        if (!$maquinaria) {
            return response()->json(['error' => 'Maquinaria no encontrada'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['data' => $maquinaria], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $maquinaria = Maquinaria::find($id);
        if (!$maquinaria) {
            return response()->json(['error' => 'Maquinaria no encontrada'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $maquinaria], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'marca'       => 'nullable|string|max:100',
            'modelo'      => 'nullable|string|max:100',
            'anio'        => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'chasis'      => 'nullable|string|max:100',
            'patente'     => 'nullable|string|max:20',
            'kilometraje' => 'nullable|integer|min:0',
        ]);
        $maquinaria = Maquinaria::find($id);
        if (!$maquinaria) {
            return response()->json(['error' => 'Maquinaria no encontrada'], Response::HTTP_NOT_FOUND);
        }

        try {
            $maquinaria->update($validated);
            return response()->json(['data' => $maquinaria], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la maquinaria'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maquinaria = Maquinaria::find($id);
        if (!$maquinaria) {
            return response()->json(['error' => 'Maquinaria no encontrada'], Response::HTTP_NOT_FOUND);
        }

        try {
            $maquinaria->delete();
            return response()->json(['message' => 'Maquinaria eliminada'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la maquinaria'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
