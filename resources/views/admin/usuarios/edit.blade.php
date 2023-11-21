@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Asignar rol/es</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <p class="h5">Email:</p>
            <p class="form-control">{{ $user->email }}</p>


            <p class="h5">Roles:</p>

            {!! Form::model($user, ['route' => ['admin.usuarios.update',$user],'autocomplete' => 'off','method' => 'put']) !!}
                <div class="form-group">
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>


                {!! Form::submit('Asignar rol/es', ['class' => 'btn btn-primary']) !!}
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