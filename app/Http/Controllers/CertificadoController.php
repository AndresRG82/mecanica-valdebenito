<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificados = Certificado::with(['empresaEmisora', 'empresaReceptora', 'servicio', 'maquinaria'])->paginate(15);
        return view('certificados.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return response()->json(['message' => 'No implementado. Utiliza POST /certificados para crear.'], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'empresa_emisora_id' => 'required|exists:empresas,id',
            'empresa_receptora_id' => 'required|exists:empresas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'maquinaria_id' => 'required|exists:maquinarias,id',
            'codigo_qr' => 'required|string|max:255',
            'fecha_emision' => 'required|date',
        ]);

        $certificado = Certificado::create($validated);

        return redirect()->route('certificados.show', $certificado)->with('success', 'Certificado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $certificado = Certificado::with(['empresaEmisora', 'empresaReceptora', 'servicio', 'maquinaria'])->findOrFail($id);
        return view('certificados.show', compact('certificado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certificado = Certificado::findOrFail($id);
        // Puedes cargar aquí las empresas, servicios y maquinarias para el formulario
        return view('certificados.edit', compact('certificado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificado = Certificado::findOrFail($id);

        $validated = $request->validate([
            'empresa_emisora_id' => 'nullable|exists:empresas,id',
            'empresa_receptora_id' => 'nullable|exists:empresas,id',
            'servicio_id' => 'nullable|exists:servicios,id',
            'maquinaria_id' => 'nullable|exists:maquinarias,id',
            'codigo_qr' => 'nullable|string|max:255',
            'fecha_emision' => 'nullable|date',
        ]);

        $certificado->update($validated);

        return redirect()->route('certificados.show', $certificado)->with('success', 'Certificado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificado = Certificado::findOrFail($id);
        $certificado->delete();

        return redirect()->route('certificados.index')->with('success', 'Certificado eliminado correctamente.');
    }
}
