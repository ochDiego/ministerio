<div>

    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ministerio de Educación de la provincia de San Juan
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg shadow-lg">

            <div class="px-6 py-4">

                <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center w-full">
                        <span>Tipo de doc.:</span>
                        <x-select class="ml-2 w-full" wire:model.live="tiposDocFilter">
                            @foreach ($tiposDocumentos as $tiposDoc)
                                <option value="{{ $tiposDoc->id }}">{{ $tiposDoc->nombre }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="flex items-center">
                        <span>Año:</span>
                        <x-select class="ml-2 w-full" wire:model.live="fechaFilter">
                            @for($i = 2010;$i <= 2060;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </x-select>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 my-4 gap-3">
                    
                    <div class="flex items-center">
                        <span>Institución:</span>
                        <x-select class="ml-2 w-full" wire:model.live="organismoFilter">
                            @foreach ($organismos as $organismo)
                                <option value="{{ $organismo->id }}">{{ $organismo->nombre }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="flex items-center">
                        <span>Tema:</span>
                        <x-select class="ml-2 w-full" wire:model.live="temaFilter">
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}">{{ $tema->nombre }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    
                </div>

                <div class="grid grid-cols-2 my-4 gap-3">

                    <div class="flex items-center">
                        <span>Institución:</span>
                        <x-select class="ml-2 w-full" wire:model.live="institucionFilter">
                            @foreach ($instituciones as $institucione)
                                <option value="{{ $institucione->id }}">{{ $institucione->nombre }}</option>
                            @endforeach
                        </x-select>
                    </div>
                                
                </div>

            </div>

            @if ($documentos->count())
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tipo de doc.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Institución
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Representante
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Institución
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Representante
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Año
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tema
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($documentos as $documento)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py- font-medium text-gray-900 dark:text-white">
                                    {{ $documento->tiposDocumento->nombre }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->organismo->nombre }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->organismo->representante }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->institucione->nombre }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->institucione->representante }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->fecha_suscripcion}}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $documento->tema->nombre }}
                                </td>
                                <td width="145" scope="row">
                                    <a href="{{ route('documentos.show',$documento) }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                        Ver más
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>                   
            @else
                <div class="px-6 py-4 text-center">
                    <strong>No hay datos.</strong>
                </div>
            @endif

            @if ($documentos->hasPages())
                <div class="px-6 py-3">
                    {{ $documentos->links() }}
                </div>
            @endif
            
        </div>

    </div>
</div>
