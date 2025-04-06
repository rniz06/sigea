<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuarioController;
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

    /*
    |--------------------------------------------------------------------------
    | Modulo Usuario
    |--------------------------------------------------------------------------
    */
    Route::controller(UsuarioController::class)->group(function () {
        Route::get('usuarios', 'index')->name('usuarios.index');
        Route::get('usuarios/create', 'create')->name('usuarios.create');
        Route::post('usuarios/store', 'store')->name('usuarios.store');
        Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
        Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit');
        Route::put('usuarios/{usuario}', 'update')->name('usuarios.update');
        Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy');
    });
});