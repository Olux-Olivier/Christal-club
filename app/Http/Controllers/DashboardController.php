<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use App\Models\Plat;

class DashboardController extends Controller
{
    /**
     * Affichage du dashboard admin
     */
    public function index()
    {
        return view('dashbord', [
            // PLATS
            'platsCount'        => Plat::count(),
            'autresPlatsCount'  => Plat::where('categorie', '!=', 'principal')->count(),

            // BOISSONS
            'boissonsSucrees'   => Boisson::where('categorie', 'sucree')->count(),
            'boissonsAlcool'   => Boisson::where('categorie', 'alcoolisee')->count(),

            // TOTAL
            'totalBoissons'    => Boisson::count(),
        ]);
    }
}
