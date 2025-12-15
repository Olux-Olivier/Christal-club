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
        // Validation
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required|in:alcoolisee,sucree',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Initialiser imageName
        $imageName = null;

        // Sauvegarde de l'image si elle existe
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('boissons', $imageName, 'public');
        }

        // Création de la boisson
        Boisson::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'categorie' => $request->categorie,
            'image' => $imageName,
        ]);

        return back()->with('success', 'Boisson ajoutée avec succès !');
    }


    // AFFICHAGE DES BOISSONS
   public function alcool()
    {
        $boissons = Boisson::where('categorie', 'alcoolisee')->paginate(9);
        return view('menus.boissons_alcool', compact('boissons'));
    }


    public function sucree()
    {
        // Récupère les boissons sucrées paginées
        $boissons = Boisson::where('categorie', 'sucree')->paginate(9); // 9 par page
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
