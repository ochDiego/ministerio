<div class="card">
    <div class="card-header">
        <input type="text" wire:model.live="search" class="form-control w-full" placeholder="Búscar">
    </div>

    @if ($tiposDocumentos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tiposDocumentos as $tiposdocumento)
                        <tr>
                            <td>{{ $tiposdocumento->nombre }}</td>
                            <td width="10">
                                @can('admin.tiposdocumentos.edit')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.tiposdocumentos.edit',$tiposdocumento) }}" role="button">
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="10">
                                @can('admin.tiposdocumentos.delete')
                                    <form action="{{ route('admin.tiposdocumentos.destroy',$tiposdocumento) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $tiposDocumentos->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>

