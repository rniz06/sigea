@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Proveedores')
@section('content_header_title', 'Proveedores')
@section('content_header_subtitle', 'Editar')

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

        <x-form title="Actualizar Proveedor" color="warning" method="POST"
            action="{{ route('proveedores.update', $proveedor->id) }}">

            @method('PUT')

            <x-input label="Razón Social" type="text" name="prov_razonsocial" placeholder="Razón Social..."
                value="{{ $proveedor->prov_razonsocial }}" />

            <x-input label="Ruc" type="text" name="prov_ruc" placeholder="Ruc..."
                value="{{ $proveedor->prov_ruc }}" />

            <x-input label="Correo" type="email" name="prov_correo" placeholder="Correo..."
                value="{{ $proveedor->prov_correo }}" />

            <x-input label="Dirección" type="text" name="prov_direccion" placeholder="Dirección..."
                value="{{ $proveedor->prov_direccion }}" />

            <x-input label="Teléfono" type="text" name="prov_telefono" placeholder="Teléfono..."
                value="{{ $proveedor->prov_telefono }}" />

            <x-select label="Ciudad" name="ciudad_id" id="ciudad">
                <option>Seleccionar...</option>
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" {{ $ciudad->id == $proveedor->ciudad_id ? 'selected' : '' }}>
                        {{ $ciudad->ciu_descripcion ?? 'N/A' }}
                    </option>
                @endforeach
            </x-select>

            <x-slot name="buttons">
                <x-button type="submit" color="warning">Guardar</x-button>
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
