<?php

use App\Http\Controllers\Compras\ProveedorController;
use Illuminate\Support\Facades\Route;

// Grupo de Rutas Protegidas por Autenticación
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Modulo Proveedores
    |--------------------------------------------------------------------------
    */
    Route::controller(ProveedorController::class)->group(function () {
        Route::get('proveedores', 'index')->name('proveedores.index');
        Route::get('proveedores/create', 'create')->name('proveedores.create');
        Route::post('proveedores/store', 'store')->name('proveedores.store');
        Route::get('proveedores/{proveedor}', 'show')->name('proveedores.show');
        Route::get('proveedores/{proveedor}/edit', 'edit')->name('proveedores.edit');
        Route::put('proveedores/{proveedor}', 'update')->name('proveedores.update');
        Route::delete('proveedores/{proveedor}', 'destroy')->name('proveedores.destroy');
    });
});