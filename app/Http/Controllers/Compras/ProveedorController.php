<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use App\Http\Requests\Compras\Proveedor\StoreProveedorRequest;
use App\Http\Requests\Compras\Proveedor\UpdateProveedorRequest;
use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('compras.proveedores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciudades = Ciudad::select('id', 'ciu_descripcion')->get();
        return view('compras.proveedores.create', compact('ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request)
    {
        Proveedor::create([
            'prov_razonsocial' => $request->prov_razonsocial,
            'prov_ruc' => $request->prov_ruc,
            'prov_correo' => $request->prov_correo,
            'prov_direccion' => $request->prov_direccion,
            'prov_telefono' => $request->prov_telefono,
            'ciudad_id' => $request->ciudad_id,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        $ciudades = Ciudad::select('id', 'ciu_descripcion')->get();
        $proveedor->load('ciudad');
        return view('compras.proveedores.edit', compact('proveedor', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        $proveedor->update([
            'prov_razonsocial' => $request->prov_razonsocial,
            'prov_ruc' => $request->prov_ruc,
            'prov_correo' => $request->prov_correo,
            'prov_direccion' => $request->prov_direccion,
            'prov_telefono' => $request->prov_telefono,
            'ciudad_id' => $request->ciudad_id,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor Eliminado Correctamente');
    }
}
