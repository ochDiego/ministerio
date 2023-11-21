<div class="card">
    <div class="card-header">
        <input type="text" wire:model.live="search" class="form-control w-full" placeholder="Búscar">
    </div>

    @if ($instituciones->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Representante</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instituciones as $institucione)
                        <tr>
                            <td>{{ $institucione->nombre }}</td>
                            <td>{{ $institucione->representante }}</td>
                            <td width="10">
                                @can('admin.instituciones.edit')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.instituciones.edit',$institucione) }}" role="button">
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="10">
                                @can('admin.instituciones.delete')
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.instituciones.delete',$institucione) }}" role="button">
                                        Eliminar
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $instituciones->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>
