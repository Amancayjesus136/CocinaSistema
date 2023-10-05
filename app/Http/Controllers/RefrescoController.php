<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refresco;


class RefrescoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refrescos = Refresco::query();
        if (!empty($_GET['s'])) {
            $refrescos = $refrescos->where('idRefrescos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('refrescos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('precio_refresco', 'LIKE', '%'.$_GET['s'].'%');
            }
            $refrescos = $refrescos->get();
        return view('refresco.index', compact('refrescos'));
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
        Refresco::create($request->all());
        return redirect()->route('listadorefrescos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ididRefrescos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ididRefrescos)
    {
        $refresco = Refresco::findOrFail($idRefrescos);
        return redirect()->route('listadorefrescos.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idRefrescos)
    {
        $refresco = Refresco::findOrFail($idRefrescos);
        $refresco->update($request->all());
        return redirect()->route('listadorefrescos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idRefrescos)
    {
        $refresco = Refresco::findOrFail($idRefrescos);
        $refresco->delete();
        return redirect()->route('listadorefrescos.index');
    }
}
