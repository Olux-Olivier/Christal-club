<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
     * AFFICHAGE DES BOISSONS CLIENT
     */
    public function alcool()
    {
        $boissons = Boisson::where('categorie', 'alcoolisee')
            ->orderBy('type')   // IMPORTANT pour le groupement visuel
            ->orderBy('nom')
            ->paginate(9);

        return view('menus.boissons_alcool', compact('boissons'));
    }


    public function sucree()
    {
        $boissons = Boisson::where('categorie', 'sucree')->paginate(9);
        return view('menus.boissons_sucrees', compact('boissons'));
    }

    /**
     * AFFICHAGE DES BOISSONS ADMIN
     */
    public function liste_alcool()
    {
        $boissons = Boisson::where('categorie', 'alcoolisee')->get();
        return view('boissons.liste_alcool', compact('boissons'));
    }

    public function liste_sucree()
    {
        $boissons = Boisson::where('categorie', 'sucree')->get();
        return view('boissons.liste_sucree', compact('boissons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boisson $boisson)
    {
        return view('boissons.edit', compact('boisson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boisson $boisson)
    {
        $request->validate([
            'nom'   => 'required|string|max:255',
            'prix'  => 'required|numeric',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20048',
        ]);

        if ($request->hasFile('image')) {

            /** Supprimer anciennes images */
            Storage::disk('public')->delete([
                "boissons/{$boisson->image}",
                "boissons/{$boisson->thumbnail}",
            ]);

            $imageFile = $request->file('image');
            $baseName  = time();

            /** Image HD */
            $imageName = "original_{$baseName}." . $imageFile->extension();
            $imageFile->storeAs('boissons', $imageName, 'public');

            /** Thumbnail */
            $manager = new ImageManager(new Driver());

            $thumbnail = $manager
                ->read($imageFile->getPathname())
                ->cover(400, 600)
                ->toJpeg(70);

            $thumbName = "thumb_{$baseName}.jpg";

            Storage::disk('public')->put(
                "boissons/{$thumbName}",
                $thumbnail
            );

            $boisson->update([
                'image'     => $imageName,
                'thumbnail' => $thumbName,
            ]);
        }

        $boisson->update([
            'nom'  => $request->nom,
            'prix' => $request->prix,
            'type' => $request->type
        ]);

        return back()->with('success', 'Boisson modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boisson $boisson)
    {
        Storage::disk('public')->delete([
            "boissons/{$boisson->image}",
            "boissons/{$boisson->thumbnail}",
        ]);

        $boisson->delete();

        return back()->with('success', 'Boisson supprimée');
    }
}
