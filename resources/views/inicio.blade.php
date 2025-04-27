@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Bienvenido')
@section('content_header_title', 'Inicio')
@section('content_header_subtitle', 'Bienvenido')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Bienvenido al panel de administración.</p>
@stop

{{-- Push extra CSS --}}

@push('css')
    
@endpush

{{-- Push extra scripts --}}

@push('js')
    
@endpush