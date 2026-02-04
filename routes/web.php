<?php

use Illuminate\Support\Facades\Route;

// Todas las rutas son manejadas por Vue Router
Route::get('/{any?}', function () {
    return view('app');
})->where('any', '.*');
