<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrganismoController;
use App\Http\Controllers\Admin\InstitucioneController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('organismos', OrganismoController::class)->except('show','destroy')->names('admin.organismos');

Route::get('/organismos/{organismo}/eliminar', [OrganismoController::class, 'delete'])->name('admin.organismos.delete');

Route::resource('instituciones', InstitucioneController::class)->except('show','destroy')->names('admin.instituciones');

Route::get('instituciones/{institucione}/eliminar', [InstitucioneController::class, 'delete'])->name('admin.instituciones.delete');