<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Usuarios <a href="{{ route('usuarios.create') }}"
                class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Añadir</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Nombre: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="name"></th>
                    <th>Correo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="email"></th>
                    <th>Username: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="username"></th>
                    <th>creado el: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="created_at"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre Completo:</th>
                    <th>Email:</th>
                    <th>Username:</th>
                    <th>Creado el:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>#</td>
                        <td>{{ $usuario->name ?? 'N/A' }}</td>
                        <td>{{ $usuario->email ?? 'N/A' }}</td>
                        <td>{{ $usuario->username ?? 'N/A' }}</td>
                        <td>
                            @if (!empty($usuario->getRoleNames()))
                                @foreach ($usuario->getRoleNames() as $v)
                                    <label class="badge badge-secondary text-light">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td> {{ date('d/m/Y', strtotime($usuario->created_at ?? 'N/A')) }} </td>
                        <td>
                            <x-dropdown>
                                <x-slot name="edit">{{ route('usuarios.edit', $usuario->id) }}</x-slot>

                                {{-- @if (auth()->user()->can('Usuarios Eliminar'))
                                    <x-slot name="action">{{ route('usuarios.destroy', $usuario->id_usuario) }}</x-slot>
                                @endif --}}
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center font-italic">Sin Registros coincidentes...</td>
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
        {{ $usuarios->links() }}
    </div>
</div>
