<?php

namespace App\Livewire\Compras\Proveedores;

use App\Exports\ExcelGenericoExport;
use App\Exports\PdfGenericoExport;
use Livewire\Attributes\Validate;
use App\Models\Ciudad;
use App\Models\Compras\Proveedor;
use App\Models\Vistas\Compras\VtProveedor;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class Index extends Component
{
    // Usar el trait WithPagination para la paginación
    use WithPagination;

    // Variables para el formulario
    public $proveedor_id;
    #[Validate]
    public $prov_razonsocial, $prov_ruc, $prov_direccion, $prov_telefono, $prov_correo, $ciudad_id;

    // Variables para la paginación, busqueda y estado(modo) del formulario
    public $modo = 'inicio'; // inicio, agregar, modificar, seleccionado
    public $buscador = '';
    public $paginado = 5;

    // Habilita el formulario para agregar un registro
    public function agregar()
    {
        $this->resetearForm();
        $this->modo = 'agregar';
    }

    // Habilita los botones de editar, eliminar y cancelar
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

    // Habilita el formulario para editar un registro (La información ya esta cargada por el metodo "seleccionado()")
    public function editar()
    {
        $this->modo = 'modificar';
    }

    // Deshabilita el formulario y borra los datos ingresados o seleccionados
    public function cancelar()
    {
        $this->resetearForm();
    }

    // Elimina el registro que obtuvimos con el metodo "seleccionado()"
    public function eliminar()
    {
        if ($this->proveedor_id) {
            Proveedor::destroy($this->proveedor_id);
            $this->resetearForm();
        }
    }

    // Reglas de validación
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

    public function modometodo()
    {
        $this->emit('modometodo', $this->modo);
    }

    public function grabar()
    {
        // Validar los datos
        $validados = $this->validate();

        if ($this->modo === 'agregar') {
            Proveedor::create($validados);
        } elseif ($this->modo === 'modificar' && $this->proveedor_id) {
            Proveedor::findOrFail($this->proveedor_id)->update($validados);
        }

        $this->resetearForm();
    }

    // Restablecer formulario a deshabilitado y limpiar datos ingresados o seleccionados
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

    // Limpiar el buscador y la paginación al cambiar de pagina
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

    public function excel()
    {
        $datos = VtProveedor::select('prov_razonsocial', 'prov_ruc', 'prov_direccion', 'prov_telefono', 'prov_correo', 'ciu_descripcion')->get();
        $encabezados = ['Razon Social', 'Ruc', 'Dirección', 'Teléfono', 'Correo', 'Ciudad'];

        return Excel::download(new ExcelGenericoExport($datos, $encabezados), 'Proveedores.xlsx');
    }

    public function pdf()
    {
        $nombre_archivo = "Proveedores";
        $datos = VtProveedor::select('prov_razonsocial', 'prov_ruc', 'prov_direccion', 'prov_telefono', 'prov_correo', 'ciu_descripcion')->get();
        $encabezados = ['Razon Social', 'Ruc', 'Dirección', 'Teléfono', 'Correo', 'Ciudad'];

        return (new PdfGenericoExport($datos, $encabezados, $nombre_archivo))->download();
    }

    // public function pdf()
    // {
    //     $nombre_archivo = "Proveedores";
    //     $datos = VtProveedor::select('prov_razonsocial', 'prov_ruc', 'prov_direccion', 'prov_telefono', 'prov_correo', 'ciu_descripcion')->get();
    //     $encabezados = ['Razon Social', 'Ruc', 'Dirección', 'Teléfono', 'Correo', 'Ciudad'];

    //     $pdf = Pdf::loadView('pdf-general', ['nombre_archivo' => $nombre_archivo, 'datos' => $datos, 'encabezados' => $encabezados]);
    //     return response()->streamDownload(function () use ($pdf) {
    //         echo $pdf->stream();
    //     }, $nombre_archivo . '.pdf');
    // }
}
