@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Usuarios')
@section('content_header_title', 'Usuarios')
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

        <x-form title="Registrar Usuario" method="POST" action="{{ route('usuarios.store') }}">

            <x-input label="Nombre" type="text" name="name" placeholder="Nombre del Usuario..." />

            <x-input label="Email" type="text" name="email" placeholder="Email..." />

            <x-input label="Username" type="text" name="username" placeholder="Username..." />

            <x-input label="Contraseña" type="password" name="password" placeholder="Contraseña..." />

            <x-slot name="buttons">
                <x-button type="submit">Guardar</x-button>
                <x-button-back href="{{ route('usuarios.index') }}">Cancelar</x-button-back>
            </x-slot>

        </x-form>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush
