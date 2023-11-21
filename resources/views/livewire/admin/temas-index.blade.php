<div class="card">
    <div class="card-header">
        <input type="text" wire:model.live="search" class="form-control w-full" placeholder="Búscar">
    </div>

    @if ($temas->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temas as $tema)
                        <tr>
                            <td>{{ $tema->nombre }}</td>
                            <td width="10">
                                @can('admin.temas.edit')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.temas.edit',$tema) }}" role="button">
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="10">
                                @can('admin.temas.delete')
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.temas.delete',$tema) }}" role="button">
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
            {{ $temas->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>
