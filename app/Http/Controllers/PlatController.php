<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required|in:plat,autres_plats',
        ]);

        Plat::create($request->all());

        return back()->with('success', 'Plat ajouté avec succès');
    }

    // AFFICHAGE D'UN PLAT

    public function plats()
    {
        $plats = Plat::where('categorie', 'plat')->get();
        return view('menus.plats', compact('plats'));
    }

    public function autresPlats()
    {
        $plats = Plat::where('categorie', 'autres_plats')->get();
        return view('menus.autres_plats', compact('plats'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Plat $plat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plat $plat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plat $plat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plat $plat)
    {
        //
    }
}
