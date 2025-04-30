<div>
    <!-- Formulario -->
    <x-card-form>
        <x-card-input label="Razón Social" placeholder="Razón Social..." campo="prov_razonsocial" />

        <x-card-input label="Ruc" placeholder="Ruc..." campo="prov_ruc" />

        <x-card-input label="Dirección" placeholder="Dirección..." campo="prov_direccion" />

        <x-card-input label="Teléfono" placeholder="Teléfono..." campo="prov_telefono" />

        <x-card-input label="Correo" placeholder="Correo..." campo="prov_correo" />

        <div class="col-4">
            <label for="ciudad_id">Ciudad:</label>
            <select class="form-control @error('ciudad_id') is-invalid @enderror" id="ciudad" wire:model="ciudad_id">
                <option value="">Seleccione una ciudad</option>

            </select>
            @error('ciudad_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <x-slot name="buttons">
            <x-button type="submit" icon="fas fa-plus" color="success">Agregar</x-button>
            <x-button type="submit" icon="fas fa-edit" color="primary">Modificar</x-button>
            <x-button type="submit" icon="fas fa-trash" color="danger">Eliminar</x-button>
            <x-button type="submit" color="default">Grabar</x-button>
            <x-button type="submit" icon="fas fa-window-close" color="warning  ">Cancelar</x-button>
        </x-slot>
    </x-card-form>


    <!-- Tabla -->
    <x-dataTable id="proveedores-table" titulo="Listado de Proveedores">
        <x-slot name="cabeceras">
            <th>Razón Social</th>
            <th>Ruc</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </x-slot>

        {{-- Cuerpo vacío, lo llenará DataTable --}}

    </x-dataTable>

</div>

@push('scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#proveedores-table").DataTable({
                processing: true,
                serverSide: true,
                "ajax": "{{ route('proveedores.ajax') }}",
                "columns": [
                { data: "prov_razonsocial" },
                { data: "prov_ruc" },
                { data: "prov_direccion" },
                { data: "prov_telefono" },
                { data: "prov_correo" },
                { data: "ciudad.ciu_descripcion" } // relación cargada con with('ciudad')
                ],
                "pageLength": 5,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                //"dom": 'Bfrtip', // <--- AGREGADO
                dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": {
                    "url": "{{ asset('vendor/datatables/i18n/es.json') }}"
                }
            }).buttons().container().appendTo('#proveedores-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
