@extends('adminlte::page')

@section('title', 'Instituciones (1ra)')

@section('content_header')

    @can('admin.instituciones.create')
        <a class="btn btn-primary float-right" href="{{ route('admin.instituciones.create') }}" role="button">
            Nueva institución
        </a>
    @endcan

    <h1>Lista de instituciones (2da)</h1>
@stop

@section('content')
    @livewire('admin.instituciones-index')
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
                    title: "¿Está seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, bórralo!"
                    }).then((result) => {
                            if (result.isConfirmed) {

                                form.submit();

                                Swal.fire({
                                title: "¡Eliminado!",
                                text: "El registro ha sido eliminado.",
                                icon: "success"
                                });
                            }
                        });
            })
        });

    </script>
@stop