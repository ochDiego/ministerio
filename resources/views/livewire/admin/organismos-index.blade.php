<div class="card">
    <div class="card-header">
        <input type="text" wire:model.live="search" class="form-control w-full" placeholder="Búscar">
    </div>

    @if ($organismos->count())
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
                    @foreach ($organismos as $organismo)
                        <tr>
                            <td>{{ $organismo->nombre }}</td>
                            <td>{{ $organismo->representante }}</td>
                            <td width="10">
                                @can('admin.organismos.edit')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.organismos.edit',$organismo) }}" role="button">
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="10">
                                @can('admin.organismos.delete')
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.organismos.delete',$organismo) }}" role="button">
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
            {{ $organismos->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>
