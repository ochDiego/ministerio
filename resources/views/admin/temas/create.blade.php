@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Registrar nuevo tema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.temas.store','autocomplete' => 'off']) !!}

                @include('admin.temas.partials.form')

                {!! Form::submit('Registrar tema', ['class' => 'btn btn-success']) !!}

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