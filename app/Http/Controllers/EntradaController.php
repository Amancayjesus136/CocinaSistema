<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = Entrada::all();
        return view ('entrada.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Entrada::create($request->all());
        return redirect()->route('listadoentradas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idEntradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idEntradas)
    {
        $entrada = Entrada::findOrFail($idEntradas);
        return redirect()->route('listadoentradas.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idEntradas)
    {
        $entrada = Entrada::findOrFail($idEntradas);
        $entrada->update($request->all());
        return redirect()->route('listadoentradas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idEntradas)
    {
        $entrada = Entrada::findOrFail($idEntradas);
        $entrada->delete();
        return redirect()->route('listadoentradas.index');
    }
}
