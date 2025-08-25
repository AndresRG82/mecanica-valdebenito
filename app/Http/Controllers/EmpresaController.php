<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json($empresas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'No implementado. Utiliza POST /empresas para crear.'], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'    => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono'  => 'required|string|max:50',
            'email'     => 'required|email|max:255',
            'tipo'      => 'required|string|max:100',
        ]);

        $empresa = Empresa::create($validated);
        return response()->json($empresa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }
        return response()->json($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'No implementado. Utiliza PUT/PATCH /empresas/{id} para editar.'], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'nombre'    => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono'  => 'nullable|string|max:50',
            'email'     => 'nullable|email|max:255',
            'tipo'      => 'nullable|string|max:100',
        ]);
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }
        $empresa->update($request->all());
        return response()->json($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }
        $empresa->delete();
        return response()->json(['message' => 'Empresa eliminada']);
    }
}
