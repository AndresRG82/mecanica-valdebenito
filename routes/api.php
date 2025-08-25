<?php
use Illuminate\Support\Facades\Route;

Route::resource('certificados', CertificadoController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('maquinarias', MaquinariaController::class);
