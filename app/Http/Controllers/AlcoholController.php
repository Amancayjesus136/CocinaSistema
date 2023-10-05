<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alcoholismo;

class AlcoholController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tragos = Alcoholismo::query();
        if (!empty($_GET['s'])) {
            $tragos = $tragos->where('idAlcoholismos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('tragos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('precio_trago', 'LIKE', '%'.$_GET['s'].'%');
            }
            $tragos = $tragos->get();
        return view('alcohol.index', compact('tragos'));
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
        Alcoholismo::create($request->all());
        return redirect()->route('usuarios.edit');
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
        $trago = Alcoholismo::findOrFail($idAlcoholismos);
        return redirect()->route('listadoalcohol.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trago = Alcoholismo::findOrFail($id);
        $trago->update($request->all());
        return redirect()->route('listadoalcohol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idAlcoholismos)
{
    $trago = Alcoholismo::findOrFail($idAlcoholismos);
    $trago->delete();
    return redirect()->route('listadoalcohol.index');
}


}
