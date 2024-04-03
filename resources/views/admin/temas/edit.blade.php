@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.temas.create') }}" role="button">
        Nuevo tema
    </a>

    <h1>Editar tema</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tema,['route' => ['admin.temas.update',$tema],'autocomplete' => 'off','method' => 'put']) !!}

                @include('admin.temas.partials.form')

                {!! Form::submit('Actualizar tema', ['class' => 'btn btn-success']) !!}

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