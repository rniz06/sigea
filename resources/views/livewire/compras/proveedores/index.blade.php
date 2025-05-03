<div>
    <!-- Formulario -->
    <x-card-form>
        <x-card-input label="Razón Social" placeholder="Razón Social..." campo="prov_razonsocial" :disabled="in_array($modo, ['inicio','seleccionado'])" />

        <x-card-input label="Ruc" placeholder="Ruc..." campo="prov_ruc" :disabled="in_array($modo, ['inicio','seleccionado'])" />

        <x-card-input label="Dirección" placeholder="Dirección..." campo="prov_direccion" :disabled="in_array($modo, ['inicio','seleccionado'])" />

        <x-card-input label="Teléfono" placeholder="Teléfono..." campo="prov_telefono" :disabled="in_array($modo, ['inicio','seleccionado'])" />

        <x-card-input label="Correo" placeholder="Correo..." campo="prov_correo" :disabled="in_array($modo, ['inicio','seleccionado'])" />

        <x-select id="ciudad" label="Ciudad" campo="ciudad_id" :disabled="in_array($modo, ['inicio','seleccionado'])">
            <option value="">Seleccione una ciudad</option>
            @foreach ($ciudades as $ciudad)
                <option value="{{ $ciudad->id }}">{{ $ciudad->ciu_descripcion ?? 'N/A' }}</option>
            @endforeach
        </x-select>

        <x-slot name="buttons">
            <x-button type="button" icon="fas fa-plus" color="success" click="agregar"
            :disabled="in_array($modo, ['agregar', 'modificar', 'seleccionado'])">Agregar</x-button>

            <x-button type="button" icon="fas fa-edit" color="primary" click="editar" :disabled="in_array($modo, ['inicio', 'modificar', 'agregar'])">Modificar</x-button>

            <x-button type="button" icon="fas fa-trash" color="danger" click="confirmarEliminacion"
                :disabled="in_array($modo, ['agregar', 'modificar', 'inicio'])">Eliminar</x-button>

            <x-button type="submit" color="default" click="grabar" :disabled="in_array($modo, ['inicio', 'seleccionado'])">Grabar</x-button>

            <x-button type="button" icon="fas fa-window-close" color="warning" click="cancelar"
                :disabled="in_array($modo, ['inicio'])">Cancelar</x-button>
        </x-slot>
    </x-card-form>

    <!-- Tabla -->
    <x-tabla titulo="Listado de Proveedores">
        <x-slot name="cabeceras">
            <th>Razón Social</th>
            <th>Ruc</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </x-slot>

        @foreach ($proveedores as $proveedor)
            <tr wire:click="seleccionado({{ $proveedor->id }})">
                <td>{{ $proveedor->prov_razonsocial }}</td>
                <td>{{ $proveedor->prov_ruc }}</td>
                <td>{{ $proveedor->prov_direccion }}</td>
                <td>{{ $proveedor->prov_telefono }}</td>
                <td>{{ $proveedor->prov_correo }}</td>
                <td>{{ $proveedor->ciudad->ciu_descripcion }}</td>
            </tr>
        @endforeach
        <x-slot name="paginacion">
            {{ $proveedores->links() }}
        </x-slot>
    </x-tabla>

</div>

@push('scripts')
    <script>
        window.addEventListener('confirmar-eliminacion', event => {
            if (confirm('¿Está seguro que desea eliminar este proveedor?')) {
                @this.eliminar();
            }
        });
    </script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            $('#ciudad').select2({
                placeholder: 'Seleccionar...',
                language: "es",
            });
        });
    </script>
    {{-- <script>
        // $(function() {
        //     $("#proveedores-table").DataTable({
        //         processing: true,
        //         serverSide: true,
        //         "ajax": "{{ route('proveedores.ajax') }}",
        //         "columns": [
        //         { data: "prov_razonsocial" },
        //         { data: "prov_ruc" },
        //         { data: "prov_direccion" },
        //         { data: "prov_telefono" },
        //         { data: "prov_correo" },
        //         { data: "ciudad.ciu_descripcion" } // relación cargada con with('ciudad')
        //         ],
        //         "pageLength": 5,
        //         "responsive": true,
        //         "lengthChange": true,
        //         "autoWidth": true,
        //         //"dom": 'Bfrtip', // <--- AGREGADO
        //         dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        //             "<'row'<'col-sm-12'tr>>" +
        //             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //         "language": {
        //             "url": "{{ asset('vendor/datatables/i18n/es.json') }}"
        //         }
        //     }).buttons().container().appendTo('#proveedores-table_wrapper .col-md-6:eq(0)');
        // });
    </script> --}}
@endpush

@push('css')
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>
@endpush
