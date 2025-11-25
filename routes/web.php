<?php

use Illuminate\Support\Facades\Route;

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

