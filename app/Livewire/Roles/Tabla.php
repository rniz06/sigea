<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    // Importa el trait WithPagination para manejar la paginación de datos
    // Define el tema de paginación como 'bootstrap'
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Propiedades para búsqueda y filtrado en tiempo real

    public $name = '';
    public $paginado = 5;
    public $created_at = '';

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['name', 'created_at'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $roles = Role::buscadorName($this->name)->buscadorCreatedat($this->created_at)->paginate($this->paginado);
        return view('livewire.roles.tabla', compact('roles'));
    }
}
