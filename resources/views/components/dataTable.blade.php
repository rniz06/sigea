<!-- Tabla -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $titulo ?? 'Titulo' }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered" @if (isset($id)) id="{{ $id }}" @endif>
            <thead>
                <tr>
                    {{$cabeceras}}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>