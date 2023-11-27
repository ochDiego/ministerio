<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganismoController;
use App\Http\Controllers\Admin\InstitucioneController;
use App\Http\Controllers\Admin\TemaController;
use App\Http\Controllers\Admin\TiposDocumentoController;
use App\Http\Controllers\Admin\DocumentoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;


Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('documentos', DocumentoController::class)->except('destroy')->names('admin.documentos');

Route::get('documentos/{documento}/eliminar')->name('admin.documentos.delete');

Route::resource('organismos', OrganismoController::class)->except('show')->names('admin.organismos');

Route::resource('instituciones', InstitucioneController::class)->except('show')->names('admin.instituciones');

Route::resource('temas', TemaController::class)->except('show')->names('admin.temas');

Route::resource('tiposdocumentos', TiposDocumentoController::class)->except('show')->names('admin.tiposdocumentos');


Route::resource('usuarios', UserController::class)->only('index','edit','update','destroy')->parameters(['usuarios' => 'user'])->names('admin.usuarios');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');