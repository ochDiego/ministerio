@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <h1>Registrar nuevo documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.documentos.store','autocomplete' => 'off','files' => true]) !!}

                @include('admin.documentos.partials.form')

                {!! Form::submit('Registrar documento', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop