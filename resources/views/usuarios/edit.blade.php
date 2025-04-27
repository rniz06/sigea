@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Usuarios')
@section('content_header_title', 'Usuarios')
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

        <x-form title="Registrar Usuario" color="warning" method="POST" action="{{ route('usuarios.update', $usuario->id) }}">

            @method('PUT')

            <x-input label="Nombre" type="text" name="name" placeholder="Nombre del Usuario..." value="{{ $usuario->name }}" />

            <x-input label="Email" type="text" name="email" placeholder="Email..." value="{{ $usuario->email }}" />

            <x-input label="Username" type="text" name="username" placeholder="Username..." value="{{ $usuario->username }}" />

            <x-input label="Contraseña" type="password" name="password" placeholder="Contraseña..." />

            <x-select label="Rol" name="roles[]" id="roles" multiple>
                <option>Seleccionar...</option>
                @foreach ($roles as $value => $label)
                    <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </x-select>

            <x-slot name="buttons">
                <x-button type="submit" color="warning">Guardar</x-button>
                <x-button-back href="{{ route('usuarios.index') }}">Cancelar</x-button-back>
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
            $('#roles').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
