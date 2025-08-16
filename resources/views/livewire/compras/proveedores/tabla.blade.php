<!-- Tabla -->
    <x-tabla titulo="Listado de Proveedores" excel pdf>
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