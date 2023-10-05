<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segundo;


class SegundoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $segundos = Segundo::query();
        if (!empty($_GET['s'])) {
            $segundos = $segundos->where('idSegundos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('segundos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('precio_segundo', 'LIKE', '%'.$_GET['s'].'%');
            }
            $segundos = $segundos->get();
        return view('segundo.index', compact('segundos'));

        //$segundos = Segundo::all();
        //return view ('segundo.index', compact('segundos'));
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
        Segundo::create($request->all());
        return redirect()->route('listadosegundos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idSegundos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idSegundos)
    {
        $segundo = Segundo::findOrFail($idSegundos);
        return redirect()->route('listadosegundos.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idSegundos)
    {
        $segundo = Segundo::findOrFail($idSegundos);
        $segundo->update($request->all());
        return redirect()->route('listadosegundos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idSegundos)
    {
        $segundo = Segundo::findOrFail($idSegundos);
        $segundo->delete();
        return redirect()->route('listadosegundos.index');
    }
}
