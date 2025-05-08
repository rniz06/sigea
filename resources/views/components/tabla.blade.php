<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $titulo ?? 'Titulo' }}
            @if (isset($excel))
                <button class="btn btn-sm btn-outline-success" wire:click="excel"><i class="fas fa-file-excel"></i> Excel</button>
            @endif
            @if (isset($pdf))
                <button class="btn btn-sm btn-outline-secondary" wire:click="pdf"><i class="fas fa-file-pdf"></i> Pdf</button>
            @endif
        </h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text"class="form-control float-right" placeholder="Buscar..." wire:model.live="buscador">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{ $cabeceras }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>



    <!-- /.card-body -->


    <div class="card-footer clearfix">
        <center><select class="col-1 form-control form-contro-sm" wire:model.live="paginado">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select></center>
        {{ $paginacion }}
    </div>
</div>
