<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la intitución']) !!}

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:',) !!}
    {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Slug de la intitución','readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('representante', 'Representante:',) !!}
    {!! Form::text('representante', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre y apellido del representante de la intitución']) !!}

    @error('representante')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>