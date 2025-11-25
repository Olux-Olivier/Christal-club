<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use Illuminate\Http\Request;

class BoissonController extends Controller
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
        return view('boissons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required|in:alcoolisee,sucree',
        ]);

        Boisson::create($request->all());

        return back()->with('success', 'Boisson ajoutée');
    }

    // AFFICHAGE DES BOISSONS
    public function alcool()
    {
        $boissons = Boisson::where('categorie', 'alcoolisee')->get();
        return view('menus.boissons_alcool', compact('boissons'));
    }

    public function sucree()
    {
        $boissons = Boisson::where('categorie', 'sucree')->get();
        return view('menus.boissons_sucrees', compact('boissons'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Boisson $boisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boisson $boisson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boisson $boisson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boisson $boisson)
    {
        //
    }
}
