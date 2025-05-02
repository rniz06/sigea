<?php

namespace App\Livewire\Compras\Proveedores;

use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Variables para el formulario
    public $proveedor_id;
    public $prov_razonsocial, $prov_ruc, $prov_direccion, $prov_telefono, $prov_correo, $ciudad_id;

    public $modo = 'inicio'; // inicio, agregar, modificar, seleccionado
    public $buscador = '';
    public $paginado = 5;

    // Iniciar creación de nuevo registro
    public function agregar()
    {
        $this->resetearForm();
        $this->modo = 'agregar';
    }

    public function seleccionado($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $this->proveedor_id = $proveedor->id;
        $this->prov_razonsocial = $proveedor->prov_razonsocial;
        $this->prov_ruc = $proveedor->prov_ruc;
        $this->prov_direccion = $proveedor->prov_direccion;
        $this->prov_telefono = $proveedor->prov_telefono;
        $this->prov_correo = $proveedor->prov_correo;
        $this->ciudad_id = $proveedor->ciudad_id;
        $this->modo = 'seleccionado';
    }

    public function editar($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $this->proveedor_id = $proveedor->id;
        $this->prov_razonsocial = $proveedor->prov_razonsocial;
        $this->prov_ruc = $proveedor->prov_ruc;
        $this->prov_direccion = $proveedor->prov_direccion;
        $this->prov_telefono = $proveedor->prov_telefono;
        $this->prov_correo = $proveedor->prov_correo;
        $this->ciudad_id = $proveedor->ciudad_id;
        $this->modo = 'modificar';
    }

    public function cancelar()
    {
        $this->resetearForm();
    }

    public function eliminar()
    {
        if ($this->proveedor_id) {
            Proveedor::destroy($this->proveedor_id);
            $this->resetearForm();
        }
    }

    public function confirmarEliminacion()
    {
        $this->dispatchBrowserEvent('confirmar-eliminacion');
    }

    public function grabar()
    {
        $this->validate([
            'prov_razonsocial' => 'required|string',
            'prov_ruc' => 'required',
            // Agregar más validaciones según tu lógica
        ]);

        if ($this->modo === 'agregar') {
            Proveedor::create([
                'prov_razonsocial' => $this->prov_razonsocial,
                'prov_ruc' => $this->prov_ruc,
                'prov_direccion' => $this->prov_direccion,
                'prov_telefono' => $this->prov_telefono,
                'prov_correo' => $this->prov_correo,
                'ciudad_id' => $this->ciudad_id,
            ]);
        } elseif ($this->modo === 'modificar' && $this->proveedor_id) {
            $proveedor = Proveedor::find($this->proveedor_id);
            $proveedor->update([
                'prov_razonsocial' => $this->prov_razonsocial,
                'prov_ruc' => $this->prov_ruc,
                'prov_direccion' => $this->prov_direccion,
                'prov_telefono' => $this->prov_telefono,
                'prov_correo' => $this->prov_correo,
                'ciudad_id' => $this->ciudad_id,
            ]);
        }

        $this->resetearForm();
    }

    // Restablecer formulario
    private function resetearForm()
    {
        $this->proveedor_id = null;
        $this->prov_razonsocial = '';
        $this->prov_ruc = '';
        $this->prov_direccion = '';
        $this->prov_telefono = '';
        $this->prov_correo = '';
        $this->ciudad_id = '';
        $this->modo = 'inicio';
    }

    public function updating($key): void
    {
        if ($key === 'buscador' || $key === 'paginado') {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.compras.proveedores.index', [
            'proveedores' => Proveedor::select('id', 'prov_razonsocial', 'prov_ruc', 'prov_direccion', 'prov_telefono', 'prov_correo', 'ciudad_id')->with('ciudad')
                ->buscador($this->buscador)->orderBy('id', 'desc')->paginate($this->paginado),
            'ciudades' => Ciudad::select('id', 'ciu_descripcion')->orderBy('ciu_descripcion')->get(),
        ]);
    }
}
