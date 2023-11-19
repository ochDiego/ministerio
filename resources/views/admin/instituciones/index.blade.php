@extends('adminlte::page')

@section('title', 'Instituciones (1ra)')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.instituciones.create') }}" role="button">
        Nueva institución
    </a>

    <h1>Lista de instituciones (2da)</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @livewire('admin.instituciones-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop