@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.temas.create') }}" role="button">
        Nuevo tema
    </a>

    <h1>Lista de temas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @livewire('admin.temas-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop