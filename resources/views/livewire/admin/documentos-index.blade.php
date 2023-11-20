<div class="card">
    <div class="card-header">
        <div class="row mb-2">
            <div class="col-6">
                <span>Tipo de doc.:</span>
                <select class="form-control w-full" wire:model.live="tiposDocFilter">
                    <option value="">Seleccione</option>
                    @foreach ($tiposDocumentos as $tiposDoc)
                                <option value="{{ $tiposDoc->id }}">{{ $tiposDoc->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <span>Año:</span>
                <select class="form-control w-full" wire:model.live="fechaFilter">
                    <option value="">Seleccione</option>
                    @for($i = 2010;$i <= 2060;$i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row mb-2"">
            <div class="col-6">
                <span>Institución:</span>
                <select class="form-control w-full" wire:model.live="organismoFilter">
                    <option value="">Seleccione</option>
                    @foreach ($organismos as $organismo)
                        <option value="{{ $organismo->id }}">{{ $organismo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <span>Tema:</span>
                <select class="form-control w-full" wire:model.live="temaFilter">
                    <option value="">Seleccione</option>
                     @foreach ($temas as $tema)
                        <option value="{{ $tema->id }}">{{ $tema->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <span>Institución:</span>
                <select class="form-control w-full" wire:model.live="institucionFilter">
                    <option value="">Seleccione</option>
                    @foreach ($instituciones as $institucione)
                        <option value="{{ $institucione->id }}">{{ $institucione->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if ($documentos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipo de doc.</th>
                        <th>Institución</th>
                        <th>Representante</th>
                        <th>Institución</th>
                        <th>Representante</th>
                        <th>Año</th>
                        <th>Tema</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $documento)
                        <tr>
                            <td>{{ $documento->tiposDocumento->nombre }}</td>
                            <td>{{ $documento->organismo->nombre }}</td>
                            <td>{{ $documento->organismo->representante }}</td>
                            <td>{{ $documento->institucione->nombre }}</td>
                            <td>{{ $documento->institucione->representante }}</td>
                            <td>{{ $documento->fecha_suscripcion }}</td>
                            <td>{{ $documento->tema->nombre }}</td>
                            <td width="90">
                                <a class="btn btn-secondary btn-sm" href="{{ route('admin.documentos.show',$documento) }}" role="button">Ver más</a>
                            </td>
                            <td width="10">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.documentos.edit',$documento) }}" role="button">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $documentos->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>

