<div class="form-group">
    {!! Form::label('tipos_documento_id', 'Tipos de documento:',) !!}
    {!! Form::select('tipos_documento_id', $tiposDocumentos, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

    @error('tipos_documento_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('organismo_id', 'Institución:',) !!}
    {!! Form::select('organismo_id', $organismos, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

    @error('organismo_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('institucione_id', 'Institución:',) !!}
    {!! Form::select('institucione_id', $instituciones, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

    @error('institucione_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('tema_id', 'Tema:',) !!}
    {!! Form::select('tema_id', $temas, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

    @error('tema_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('vigencia_id', 'Vigencia:',) !!}
    {!! Form::select('vigencia_id', $vigencias, null, ['class' => 'form-control']) !!}

    @error('vigencia_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_suscripcion', 'Fecha de suscripción:',) !!}
    {!! Form::number('fecha_suscripcion', null, ['class' => 'form-control','placeholder' => 'Ingrese el año de suscripción']) !!}

    @error('fecha_suscripcion')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('archivo', 'Adjuntar archivo:',) !!}
    {!! Form::file('archivo', ['class' => 'form-file-control','accept' => '.pdf']) !!}

    
    @isset($documento->archivo)
        <p>
            <a href="{{ asset('storage/' . $documento->archivo) }}" target="_BLANK">
                Documento digital
            </a>
        </p>
    @endisset

    @error('archivo')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>