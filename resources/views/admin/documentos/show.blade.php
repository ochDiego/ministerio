@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')

    <a  class="btn btn-info float-right" href="{{ route('admin.documentos.edit',$documento) }}" role="button">
        Editar
    </a>

    <a  class="btn btn-primary float-right mr-4" href="{{ route('admin.documentos.create') }}" role="button">
        Nuevo documento
    </a>

    <h1>Detalle del documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @if ($documento->archivo)
                <p>
                    <a  class="btn btn-danger" href="{{ asset('storage/' . $documento->archivo) }}" target="_BLANK" role="button">
                        Archivo adjunto
                    </a>
                </p>
            @endif

            <p class="h5">Tipo de documento:</p>
            <p class="form-control">{{ $documento->tiposDocumento->nombre }}</p>

            <p class="h5">Institución:</p>
            <p class="form-control">{{ $documento->organismo->nombre }}</p>

            <p class="h5">Representante:</p>
            <p class="form-control">{{ $documento->organismo->representante }}</p>

            <p class="h5">Institución:</p>
            <p class="form-control">{{ $documento->institucione->nombre }}</p>

            <p class="h5">Representante:</p>
            <p class="form-control">{{ $documento->institucione->representante }}</p>

            <p class="h5">Tema:</p>
            <p class="form-control">{{ $documento->tema->nombre }}</p>

            <p class="h5">Fecha de suscripción:</p>
            <p class="form-control">{{ $documento->fecha_suscripcion }}</p>

            <p class="h5">Vigencia:</p>
            <p class="form-control">{{ $documento->vigencia->nombre }}</p>

            <p class="h5">Documento registrado por:</p>
            <p class="form-control">{{ auth()->user()->name }}</p>
            <p class="form-control">{{ auth()->user()->email }}</p>
            <p class="form-control">{{ $documento->created_at->diffForHumans() }}</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop