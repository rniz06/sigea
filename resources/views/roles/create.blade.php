@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Roles')
@section('content_header_title', 'Roles')
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

        <x-form title="Registrar Rol" method="POST" action="{{ route('roles.store') }}">

            <x-input label="Nombre del Rol" type="text" name="name" placeholder="Nombre del Rol..." />

            <div class="col-12">
                <label for="">Permisos:</label><br>
                @foreach ($permisos as $value)
                    <label><input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                            class="name">
                        {{ $value->name }}</label>
                    <br />
                @endforeach
            </div>

            <x-slot name="buttons">
                <x-button type="submit">Guardar</x-button>
                <x-button-back href="{{ route('roles.index') }}">Cancelar</x-button-back>
            </x-slot>

        </x-form>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush
