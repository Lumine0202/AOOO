<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErettsegiController;

Route::get('/', [ErettsegiController::class, 'index'])->name('erettsegi.index');
Route::post('/groups', [ErettsegiController::class, 'storeGroup'])->name('groups.store');
Route::post('/erettsegi', [ErettsegiController::class, 'store'])->name('erettsegi.store');
Route::delete('/erettsegi/{erettsegi}', [ErettsegiController::class, 'destroy'])->name('erettsegi.destroy');
Route::get('/erettsegi/{erettsegi}', [ErettsegiController::class, 'show'])->name('erettsegi.show');
Route::get('/erettsegi/{erettsegi}/edit', [ErettsegiController::class, 'edit'])->name('erettsegi.edit');
Route::put('/erettsegi/{erettsegi}', [ErettsegiController::class, 'update'])->name('erettsegi.update');

