<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('plats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required|in:plat,autres_plats',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Initialiser imageName pour éviter l'erreur
        $imageName = null;

        // sauvegarde de l'image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('plats', $imageName, 'public');
        }


        Plat::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'categorie' => $request->categorie,
            'image' => $imageName,
        ]);

        return back()->with('success', 'Plat ajouté avec succès !');
    }




    // AFFICHAGE D'UN PLAT

    public function plats()
    {
        $plats = Plat::where('categorie', 'plat')->paginate(9);
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
