<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DocumentosIndex;
use App\Http\Controllers\DocumentoController;

Route::get('/', DocumentosIndex::class)->name('documentos.index');

Route::get('/{documento}', [DocumentoController::class, 'show'])->name('documentos.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
