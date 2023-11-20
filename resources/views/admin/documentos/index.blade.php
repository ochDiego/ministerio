@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.documentos.create') }}" role="button">
        Nuevo documento
    </a>

    <h1>Lista de documentos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @livewire('admin.documentos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop