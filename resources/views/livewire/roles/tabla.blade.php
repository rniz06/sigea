<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Roles <a href="{{ route('roles.create') }}" class="btn btn-sm btn-success"><i
                    class="fas fa-plus"></i> Añadir</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Nombre: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="name"></th>
                    <th>creado el: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="created_at"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre Completo:</th>
                    <th>Creado el:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $rol)
                    <tr>
                        <td>#</td>
                        <td>{{ $rol->name ?? 'N/A' }}</td>
                        <td> {{ date('d/m/Y', strtotime($rol->created_at ?? 'N/A')) }} </td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Roles Editar'))
                                    <x-slot name="edit">{{ route('roles.edit', $rol->id) }}</x-slot>
                                @endif
                                @if (auth()->user()->can('Usuarios Eliminar'))
                                    <x-slot name="action">{{ route('roles.destroy', $rol->id) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center font-italic">Sin Registros coincidentes...</td>
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
        {{ $roles->links() }}
    </div>
</div>
