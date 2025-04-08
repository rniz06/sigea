@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Proveedores')
@section('content_header_title', 'Proveedores')
@section('content_header_subtitle', 'Añadir')

{{-- Content body: main page content --}}

@section('content_body')
    <div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-form title="Registrar Proveedor" method="POST" action="{{ route('proveedores.store') }}">

            <x-input label="Razón Social" type="text" name="prov_razonsocial" placeholder="Razón Social..." />

            <x-input label="Ruc" type="text" name="prov_ruc" placeholder="Ruc..." />

            <x-input label="Correo" type="email" name="prov_correo" placeholder="Correo..." />

            <x-input label="Dirección" type="text" name="prov_direccion" placeholder="Dirección..." />

            <x-input label="Teléfono" type="text" name="prov_telefono" placeholder="Teléfono..." />

            <x-select label="Ciudad" name="ciudad_id" id="ciudad">
                <option>Seleccionar...</option>
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                        {{ $ciudad->ciu_descripcion ?? 'N/A' }}
                    </option>
                @endforeach
            </x-select>

            <x-slot name="buttons">
                <x-button type="submit">Guardar</x-button>
                <x-button-back href="{{ route('proveedores.index') }}">Cancelar</x-button-back>
            </x-slot>

        </x-form>
    </div>
@stop

@section('plugins.Select2', true)

{{-- Push extra CSS --}}

@push('css')
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        $(document).ready(function() {
            $('#ciudad').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
