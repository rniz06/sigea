<?php

namespace App\Livewire\Compras\Proveedores;

use App\Models\Compras\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        return view('livewire.compras.proveedores.index');
    }
}
