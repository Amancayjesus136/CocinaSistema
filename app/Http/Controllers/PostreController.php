<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postre;

class PostreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postres = Postre::query();
        if (!empty($_GET['s'])) {
            $postres = $postres->where('idPostres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('postres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('precio_postre', 'LIKE', '%'.$_GET['s'].'%');
            }
            $postres = $postres->get();
        return view('postre.index', compact('postres'));
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
        Postre::create($request->all());
        return redirect()->route('listadopostres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idPostres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idPostres)
    {
        $postre = Postre::findOrFail($idPostres);
        return redirect()->route('listadopostres.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idPostres)
    {
        $postre = Postre::findOrFail($idPostres);
        $postre->update($request->all());
        return redirect()->route('listadopostres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idPostres)
    {
        $postre = Postre::findOrFail($idEntradas);
        $postre->delete();
        return redirect()->route('listadopostres.index');
    }
}
