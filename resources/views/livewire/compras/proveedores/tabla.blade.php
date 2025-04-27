<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Proveedores Registrados <a href="{{ route('proveedores.create') }}"
                class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Añadir</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Razón Social: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="prov_razonsocial"></th>
                    <th>Ruc: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="prov_ruc"></th>
                    <th>Dirección: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="prov_direccion"></th>
                    <th>Teléfono: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="prov_telefono"></th>
                    <th>Correo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="prov_correo"></th>
                    <th>Ciudad: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="ciudad_id"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Razón Social:</th>
                    <th>Ruc:</th>
                    <th>Dirección:</th>
                    <th>Teléfono:</th>
                    <th>Correo:</th>
                    <th>Ciudad:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>#</td>
                        <td>{{ $proveedor->prov_razonsocial ?? 'N/A' }}</td>
                        <td>{{ $proveedor->prov_ruc ?? 'N/A' }}</td>
                        <td>{{ $proveedor->prov_direccion ?? 'N/A' }}</td>
                        <td>{{ $proveedor->prov_telefono ?? 'N/A' }}</td>
                        <td>{{ $proveedor->prov_correo ?? 'N/A' }}</td>
                        <td>{{ $proveedor->ciudad->ciu_descripcion ?? 'N/A' }}</td>
                        <td>
                            <x-dropdown>
                                <x-slot name="edit">{{ route('proveedores.edit', $proveedor->id) }}</x-slot>

                                @if (auth()->user()->can('Usuarios Eliminar'))
                                    <x-slot name="action">{{ route('proveedores.destroy', $proveedor->id) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center font-italic">Sin Registros coincidentes...</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix col-12">
        <center><select class="col-1 form-control form-contro-sm" wire:model.live="paginado">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select></center>
        {{ $proveedores->links() }}
    </div>
</div>
