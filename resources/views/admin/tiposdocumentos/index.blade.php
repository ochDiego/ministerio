@extends('adminlte::page')

@section('title', 'Tipos de documento')

@section('content_header')

    @can('admin.tiposdocumentos.create')
        <a class="btn btn-primary float-right" href="{{ route('admin.tiposdocumentos.create') }}" role="button">
            Nuevo tipo de documento
        </a>
    @endcan

    <h1>Lista de tipos de documento</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @livewire('admin.tipos-documentos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop