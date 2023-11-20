<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganismoController;
use App\Http\Controllers\Admin\InstitucioneController;
use App\Http\Controllers\Admin\TemaController;
use App\Http\Controllers\Admin\TiposDocumentoController;
use App\Http\Controllers\Admin\DocumentoController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('documentos', DocumentoController::class)->except('destroy')->names('admin.documentos');

Route::get('documentos/{documento}/eliminar')->name('admin.documentos.delete');

Route::resource('organismos', OrganismoController::class)->except('show','destroy')->names('admin.organismos');

Route::get('/organismos/{organismo}/eliminar', [OrganismoController::class, 'delete'])->name('admin.organismos.delete');

Route::resource('instituciones', InstitucioneController::class)->except('show','destroy')->names('admin.instituciones');

Route::get('instituciones/{institucione}/eliminar', [InstitucioneController::class, 'delete'])->name('admin.instituciones.delete');

Route::resource('temas', TemaController::class)->except('show','destroy')->names('admin.temas');

Route::get('temas/{tema}/eliminar', [TemaController::class, 'delete'])->name('admin.temas.delete');

Route::resource('tiposdocumentos', TiposDocumentoController::class)->except('show','destroy')->names('admin.tiposdocumentos');

Route::get('tiposdocumentos/{tiposdocumento}/eliminar', [TiposDocumentoController::class, 'delete'])->name('admin.tiposdocumentos.delete');