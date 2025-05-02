<?php

namespace App\Livewire\Compras\Proveedores;

use Livewire\Attributes\Validate;
use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Variables para el formulario
    public $proveedor_id;
    #[Validate]
    public $prov_razonsocial, $prov_ruc, $prov_direccion, $prov_telefono, $prov_correo, $ciudad_id;

    public $modo = 'inicio'; // inicio, agregar, modificar, seleccionado
    public $buscador = '';
    public $paginado = 5;

    protected function rules()
    {
        return [
            'prov_razonsocial' => ['required', Rule::unique('proveedores')->ignore($this->proveedor_id)],
            'prov_ruc' => ['required', Rule::unique('proveedores')->ignore($this->proveedor_id)],
            'prov_direccion' => 'required',
            'prov_telefono' => ['required', Rule::unique('proveedores')->ignore($this->proveedor_id)],
            'prov_correo' => ['required', Rule::unique('proveedores')->ignore($this->proveedor_id)],
            'ciudad_id' => 'required',
        ];
    }

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
        // Validar los datos
        $validados = $this->validate();

        if ($this->modo === 'agregar') {
            Proveedor::create($validados);
        } elseif ($this->modo === 'modificar' && $this->proveedor_id) {
            $proveedor = Proveedor::find($this->proveedor_id);
            $proveedor->update($validados);
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
