<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;


class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaseosas = Bebida::all();
        return view ('bebida.index', compact('gaseosas'));
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
        Bebida::create($request->all());
        return redirect()->route('listadobebidas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idBebidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idBebidas)
    {
        $gaseosa = Bebida::findOrFail($idBebidas);
        return redirect()->route('listadobebidas.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idBebidas)
    {
        $gaseosa = Bebida::findOrFail($idBebidas);
        $gaseosa->update($request->all());
        return redirect()->route('listadobebidas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idBebidas)
    {
        $gaseosa = Bebida::findOrFail($idBebidas);
        $gaseosa->delete();
        return redirect()->route('listadobebidas.index');
    }
}
