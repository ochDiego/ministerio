@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.documentos.create') }}" role="button">
        Nuevo documento
    </a>

    <h1>Editar documento</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($documento,['route' => ['admin.documentos.update',$documento],'autocomplete' => 'off','files' => true,'method' => 'put']) !!}

                @include('admin.documentos.partials.form')

                {!! Form::submit('Actualizar documento', ['class' => 'btn btn-primary']) !!}

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