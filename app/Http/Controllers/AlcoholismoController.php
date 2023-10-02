<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alcoholismo;

class AlcoholismoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('lstalcoholismo.formulario');
    }

    public function formulario()
    {
        return view ('lstalcoholismo.formulario');

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
        $alcoholismo = new Alcoholismo;
        $alcoholismo->tragos = $request->tragos;
        $alcoholismo->precio_trago = $request->precio_trago;
        $alcoholismo->save();
        return redirect()->route('lstalcoholismo.formulario');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
