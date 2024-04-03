<div class="card">
    <div class="card-header">
        <input type="text" wire:model.live="search" class="form-control w-full" placeholder="Búscar usuario...">
    </div>

    @if ($usuarios->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>REGISTRADO</th>
                        <th>MODIFICADO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>{{ $user->updated_at->format('d/m/Y') }}</td>
                            <td width="130">
                                @can('admin.users.edit')
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.usuarios.edit',$user) }}" role="button">
                                        Asignar rol/es
                                    </a>
                                @endcan
                            </td>
                            {{-- <td width="10"> --}}
                                {{-- @can('admin.users.delete')
                                    <form action="{{route('admin.usuarios.destroy',$user)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $usuarios->links() }}
        </div>
    @else
        <div class="card-body text-center">
            <strong>No hay datos</strong>
        </div>
    @endif
</div>
