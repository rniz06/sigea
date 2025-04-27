@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Roles')
@section('content_header_title', 'Roles')
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

        <x-form title="Actualizar Rol" color="warning" method="POST" action="{{ route('roles.update', $role->id) }}">

            @method('PUT')

            <x-input label="Nombre" type="text" name="name" placeholder="Nombre del Rol..." value="{{ $role->name }}" />

            <div class="col-12">
                <label for="">Permisos:</label><br>
                @foreach ($permission as $value)
                    <label><input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                            class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                        {{ $value->name }}</label>
                    <br />
                @endforeach
            </div>

            <x-slot name="buttons">
                <x-button type="submit" color="warning">Guardar</x-button>
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
