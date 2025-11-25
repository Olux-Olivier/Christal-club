<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\BoissonController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome_splash');
});

Route::get('/menu/plats', function () {
    return view('menus.plats');
})->name('plats');

Route::get('/menu/boissons', function () {
    return view('menus.boissons');
})->name('boissons');

Route::get('/testqr', function () {
    return view('testqr');
});

// PLATS
Route::get('/plats/create', [PlatController::class, 'create']);
Route::post('/plats/store', [PlatController::class, 'store'])->name('plats.store');

// BOISSONS
Route::get('/boissons/create', [BoissonController::class, 'create']);
Route::post('/boissons/store', [BoissonController::class, 'store'])->name('boissons.store');


// AFFICHAGE DES MENUS
// PLATS
Route::get('/menus/plats/plat', [PlatController::class, 'plats'])->name('menus.plats.plat');
Route::get('/menus/plats/autres', [PlatController::class, 'autresPlats'])->name('menus.plats.autres');

// BOISSONS
Route::get('/menus/boissons/alcool', [BoissonController::class, 'alcool'])->name('menus.boissons.alcool');
Route::get('/menus/boissons/sucree', [BoissonController::class, 'sucree'])->name('menus.boissons.sucree');


