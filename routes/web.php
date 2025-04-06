<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de Autenticación
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Grupo de Rutas Protegidas por Autenticación
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
});