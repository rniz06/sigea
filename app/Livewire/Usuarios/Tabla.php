<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
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
    public $email = '';
    public $username = '';
    public $created_at = '';
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['name', 'email', 'username', 'created_at'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $usuarios = User::buscadorName($this->name)
        ->buscadorEmail($this->email)
        ->buscadorUsername($this->username)
        ->buscadorCreatedat($this->created_at)
        ->paginate($this->paginado);

        return view('livewire.usuarios.tabla', compact('usuarios'));
    }
}
