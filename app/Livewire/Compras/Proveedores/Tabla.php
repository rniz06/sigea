<?php

namespace App\Livewire\Compras\Proveedores;

use App\Models\Compras\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    // Importa el trait WithPagination para manejar la paginación de datos
    // Define el tema de paginación como 'bootstrap'
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Propiedades para búsqueda y filtrado en tiempo real

    public $prov_razonsocial = '';
    public $prov_ruc = '';
    public $prov_direccion = '';
    public $prov_telefono = '';
    public $prov_correo = '';
    public $ciudad_id = '';
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['prov_razonsocial', 'prov_ruc', 'prov_direccion', 'prov_telefono', 'prov_correo', 'ciudad_id'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $proveedores = Proveedor::with('ciudad')->buscadorRazonsocial($this->prov_razonsocial)
        ->buscadorRuc($this->prov_ruc)
        ->buscadorDireccion($this->prov_direccion)
        ->buscadorTelefono($this->prov_telefono)
        ->buscadorCorreo($this->prov_correo)
        ->buscadorCiudad($this->ciudad_id)
        ->paginate($this->paginado);
        return view('livewire.compras.proveedores.tabla', compact('proveedores'));
    }
}
