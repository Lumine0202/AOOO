<?php

use App\Http\Controllers\ErettsegiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        // Show main app page
        return app(ErettsegiController::class)->index(request());
    }
    // Otherwise, show the guest welcome page
    return redirect('/welcome');
})->name('erettsegi.index');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth'])->group(function () {
    // Main app pages
    //Route::get('/', [ErettsegiController::class, 'index'])->name('erettsegi.index');


    // Erettsegi resource routes
    Route::post('/groups', [ErettsegiController::class, 'storeGroup'])->name('groups.store');
    Route::post('/erettsegi', [ErettsegiController::class, 'store'])->name('erettsegi.store');
    Route::delete('/erettsegi/{erettsegi}', [ErettsegiController::class, 'destroy'])->name('erettsegi.destroy');
    Route::get('/erettsegi/{erettsegi}', [ErettsegiController::class, 'show'])->name('erettsegi.show');
    Route::get('/erettsegi/{erettsegi}/edit', [ErettsegiController::class, 'edit'])->name('erettsegi.edit');
    Route::put('/erettsegi/{erettsegi}', [ErettsegiController::class, 'update'])->name('erettsegi.update');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, etc.)
require __DIR__ . '/auth.php';
