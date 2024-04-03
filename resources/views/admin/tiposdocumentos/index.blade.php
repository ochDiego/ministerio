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
    <script src="{{ asset('vendor/sweetAlert2/sweetalert2@11.js') }}"></script>

    <script>

        let forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                Swal.fire({
                    title: "¿Está seguro que desea eliminar este registro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, bórralo!"
                    }).then((result) => {
                            if (result.isConfirmed) {

                                form.submit();

                                /* Swal.fire({
                                title: "¡Eliminado!",
                                text: "El registro ha sido eliminado.",
                                icon: "success"
                                }); */
                            }
                        });
            })
        });

    </script>
@stop