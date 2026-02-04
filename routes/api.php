<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes

// Properties
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/featured', [PropertyController::class, 'featured']);
Route::get('/properties/{id}', [PropertyController::class, 'show']);

// Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/latest', [BlogController::class, 'latest']);
Route::get('/blog/categories', [BlogController::class, 'categories']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);

// Contact
Route::post('/contact', [ContactController::class, 'store']);

// Admin routes (sin autenticación por simplicidad - en producción añadir middleware de auth)
Route::prefix('admin')->group(function () {
    // Properties management
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::post('/properties', [PropertyController::class, 'store']);
    Route::get('/properties/{id}', [PropertyController::class, 'show']);
    Route::post('/properties/{id}', [PropertyController::class, 'update']);
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);

    // Blog management
    Route::get('/blog', [BlogController::class, 'adminIndex']);
    Route::post('/blog', [BlogController::class, 'store']);
    Route::get('/blog/{id}', [BlogController::class, 'adminShow']);
    Route::post('/blog/{id}', [BlogController::class, 'update']);
    Route::delete('/blog/{id}', [BlogController::class, 'destroy']);

    // Contacts management
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/contacts/stats', [ContactController::class, 'stats']);
    Route::get('/contacts/{id}', [ContactController::class, 'show']);
    Route::patch('/contacts/{id}/status', [ContactController::class, 'updateStatus']);
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
});
