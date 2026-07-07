<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\PvController;
use App\Models\ContratActivite;

Route::inertia('/', 'welcome')->name('home');

Route::get('/dashboard', function () {
    $contrats = \App\Models\ContratActivite::with('client')->latest()->get();

    return inertia('dashboard', [
        'contrats' => $contrats
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/nouveau-contrat', [ContratController::class, 'create'])->name('contrats.create');
Route::post('/nouveau-contrat', [ContratController::class, 'store'])->name('contrats.store');
Route::get('/contrats/{id}', [ContratController::class, 'show'])->name('contrats.show');
Route::get('/contrats/{id}/pdf', [ContratController::class, 'genererPDF'])->name('contrats.pdf');
Route::get('/pv/{id}/pdf', [PvController::class, 'genererPDF'])->name('pv.pdf');

require __DIR__.'/settings.php';