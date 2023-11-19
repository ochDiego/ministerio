@extends('adminlte::page')

@section('title', 'Instituciones (2da)')

@section('content_header')

    <a class="btn btn-primary float-right" href="{{ route('admin.instituciones.create') }}" role="button">
        Nueva institución
    </a>

    <h1>Editar institución (2da)</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($institucione,['route' => ['admin.instituciones.update',$institucione],'autocomplete' => 'off','method' => 'put']) !!}

                @include('admin.instituciones.partials.form')

                {!! Form::submit('Actualizar institución', ['class' => 'btn btn-primary']) !!}

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