<?php

namespace App\Http\Controllers;

use App\Models\BoissonsResto;
use Illuminate\Http\Request;

class BoissonsRestoController extends Controller
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
        return view('boissons.createResto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|in:alcoolisee,sucree',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20048',
        ]);
        // On verifie  su
        if($request->categorie === "alcoolisee"){
            $request->validate([
                'type' => 'required|string|max:255'
            ]);
        } else{
            $request->validate([
                'type' => 'nullable'
            ]);
        }

        $imageName = null;
        $thumbName = null;

        if ($request->hasFile('image')) {

            $imageFile = $request->file('image');
            $baseName  = time();

            /** -------------------------
             *  Image originale (HD)
             *  ------------------------- */
            $imageName = "original_{$baseName}." . $imageFile->extension();
            $imageFile->storeAs('boissons', $imageName, 'public');

            /** -------------------------
             *  Thumbnail (CROP PRO)
             *  ------------------------- */
            $manager = new ImageManager(new Driver());

            $thumbnail = $manager
                ->read($imageFile->getPathname())
                ->cover(400, 600) // format maîtrisé (plus d’images trop longues)
                ->toJpeg(70);

            $thumbName = "thumb_{$baseName}.jpg";

            Storage::disk('public')->put(
                "boissons/{$thumbName}",
                $thumbnail
            );
        }

        Boisson::create([
            'nom'       => $request->nom,
            'prix'      => $request->prix,
            'categorie' => $request->categorie,
            'type'      => $request->type,
            'image'     => $imageName,
            'thumbnail' => $thumbName,
        ]);

        return back()->with('success', 'Boisson ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BoissonsResto $boissonsResto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoissonsResto $boissonsResto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoissonsResto $boissonsResto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoissonsResto $boissonsResto)
    {
        //
    }
}
