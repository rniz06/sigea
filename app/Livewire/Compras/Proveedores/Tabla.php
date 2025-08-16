<?php

namespace App\Livewire\Compras\Proveedores;

use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $buscador = '';
    public $paginado = 5;

    protected $listeners = ['proveedorActualizado' => '$refresh'];

    public function seleccionado($id)
    {
        $this->dispatch('proveedorSeleccionado', $id);
    }

    public function updating($key): void
    {
        if ($key === 'buscador' || $key === 'paginado') {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.compras.proveedores.tabla', [
            'proveedores' => Proveedor::with('ciudad')
                ->buscador($this->buscador)
                ->orderBy('id', 'desc')
                ->paginate($this->paginado),
        ]);
    }
}
