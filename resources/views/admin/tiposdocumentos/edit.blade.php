@extends('adminlte::page')

@section('title', 'Tipos de documento')

@section('content_header')

    @can('admin.tiposdocumentos.create')
    <a class="btn btn-primary float-right" href="{{ route('admin.tiposdocumentos.create') }}" role="button">
        Nuevo tipo de documento
    </a>
    @endcan


    <h1>Editar tipo de documento</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tiposdocumento,['route' => ['admin.tiposdocumentos.update',$tiposdocumento],'autocomplete' => 'off','method' => 'put']) !!}

                @include('admin.tiposdocumentos.partials.form')

                {!! Form::submit('Actualizar tipo de documento', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop