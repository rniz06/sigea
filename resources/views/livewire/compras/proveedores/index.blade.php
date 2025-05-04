<div>
    <!-- Formulario -->
    <x-card-form>
        <x-card-input label="Razón Social" placeholder="Razón Social..." campo="prov_razonsocial" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

        <x-card-input label="Ruc" placeholder="Ruc..." campo="prov_ruc" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

        <x-card-input label="Dirección" placeholder="Dirección..." campo="prov_direccion" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

        <x-card-input label="Teléfono" placeholder="Teléfono..." campo="prov_telefono" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

        <x-card-input label="Correo" placeholder="Correo..." campo="prov_correo" :disabled="in_array($modo, ['inicio', 'seleccionado'])" />

        <x-select id="ciudad" label="Ciudad" campo="ciudad_id" :disabled="in_array($modo, ['inicio', 'seleccionado'])">
            <option value="">Seleccione una ciudad</option>
            @foreach ($ciudades as $ciudad)
                <option value="{{ $ciudad->id }}">{{ $ciudad->ciu_descripcion ?? 'N/A' }}</option>
            @endforeach
        </x-select>

        <x-slot name="buttons">
            <x-button type="button" icon="fas fa-plus" color="success" click="agregar"
                :disabled="in_array($modo, ['agregar', 'modificar', 'seleccionado'])">Agregar</x-button>

            <x-button type="button" icon="fas fa-edit" color="primary" click="editar"
                :disabled="in_array($modo, ['inicio', 'modificar', 'agregar'])">Modificar</x-button>

            <x-button type="button" icon="fas fa-trash" color="danger" id="btn-eliminar"
                :disabled="in_array($modo, ['agregar', 'modificar', 'inicio'])">Eliminar</x-button>

            <x-button type="submit" color="default" :disabled="in_array($modo, ['inicio', 'seleccionado'])" id="btn-grabar">Grabar</x-button>

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
    {{-- Script para boton guardar --}}    
    <script>                 
        const btnGuardar = document.getElementById('btn-grabar');         
        if (btnGuardar) {             
            btnGuardar.addEventListener('click', function() {
                // Obtener el modo actual directamente de Livewire                 
                const modoActual = @this.get('modo');
                
                let titulo = modoActual === 'modificar' ? 'MODIFICAR' : 'AGREGAR';                 
                let mensaje = modoActual === 'modificar' ? '¿DESEAS ACTUALIZAR EL REGISTRO?' :                     
                    '¿DESEAS GRABAR EL NUEVO REGISTRO?';                 
                let respuesta = modoActual === 'modificar' ? 'Registro Actualizado Con Éxito' :                     
                    'Registro Creado Con Éxito';                  
                
                Swal.fire({                     
                    title: titulo,                     
                    text: mensaje,                     
                    icon: "warning",                     
                    showCancelButton: true,                     
                    confirmButtonColor: "#458E49",                     
                    confirmButtonText: "SI",                     
                    cancelButtonText: "NO",                     
                    closeOnConfirm: false                 
                }).then((result) => {                     
                    if (result.isConfirmed) {                         
                        @this.grabar();                         
                        Swal.fire({                             
                            title: "Respuesta",                             
                            text: respuesta,                             
                            icon: "success"                         
                        });                     
                    }                 
                });             
            });         
        }     
    </script>

    {{-- Script para boton eliminar --}}
    <script>
        const btnEliminar = document.getElementById('btn-eliminar');
        if (btnEliminar) {
            btnEliminar.addEventListener('click', function() {
                Swal.fire({
                    title: "ELIMINAR",
                    text: "¿DESEAS ELIMINAR EL REGISTRO SELECCIONADO?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#458E49",
                    confirmButtonText: "SI",
                    cancelButtonText: "NO",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.eliminar();
                        Swal.fire({
                            title: "Respuesta",
                            text: "Registro Eliminado Con Exito",
                            icon: "success"
                        });
                    }
                });
            });
        }
    </script>
    <!-- Script para select2 -->
    <script>
        $(document).ready(function() {
            $('#ciudad').select2({
                placeholder: 'Seleccionar...',
                language: "es",
            });
        });
    </script>
@endpush

@push('css')
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>
@endpush
