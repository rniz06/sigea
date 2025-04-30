@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Proveedores')
@section('content_header_title', 'Proveedores')
@section('content_header_subtitle', 'Listar')

{{-- Content body: main page content --}}

@section('content_body')

    {{-- Mostrar un alert en caso de haber algun mensaje --}}
    @if ($message = Session::get('success'))
        <div class="callout callout-success">
            <h5><i class="fas fa-check-circle mr-2" style="color: #28a745"></i>{{ $message }}</h5>
        </div>
    @endif

    @livewire('compras.proveedores.index')

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Incluir estilos adicionales desde el componente --}}
    @stack('scripts')
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- Incluir scripts js adicionales desde el componente --}}
    @stack('scripts')
@endpush
