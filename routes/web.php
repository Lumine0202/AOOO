<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErettsegiController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


Route::get('/', [ErettsegiController::class, 'index'])->name('erettsegi.index');
Route::post('/groups', [ErettsegiController::class, 'storeGroup'])->name('groups.store');
Route::post('/erettsegi', [ErettsegiController::class, 'store'])->name('erettsegi.store');
Route::delete('/erettsegi/{erettsegi}', [ErettsegiController::class, 'destroy'])->name('erettsegi.destroy');
Route::get('/erettsegi/{erettsegi}', [ErettsegiController::class, 'show'])->name('erettsegi.show');
Route::get('/erettsegi/{erettsegi}/edit', [ErettsegiController::class, 'edit'])->name('erettsegi.edit');
Route::put('/erettsegi/{erettsegi}', [ErettsegiController::class, 'update'])->name('erettsegi.update');


Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return response('Migrations REALLY ran 🎉', 200)
        ->withoutCookie('laravel_session')
        ->header('Cache-Control', 'no-store');
})->withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
]);

