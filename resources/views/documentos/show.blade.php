<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ministerio de Educación de la provincia de San Juan
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <div class="mb-6">
            <a href="{{ route('documentos.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mr-3">
                Volver
            </a>

            
                <a href="{{ asset('storage/' . $documento->archivo) }}" target="_BLANK" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Documento digital
                </a>
            
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Tipo de documento</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->tiposDocumento->nombre }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Institución</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->organismo->nombre }}
                </p>

                <div class="px-6 py-2">
                    <hr>
                </div>

                <h2 class="px-6 pt-2 font-bold">Representante</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->organismo->representante }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Institución</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->institucione->nombre }}
                </p>

                <div class="px-6">
                    <hr>
                </div>

                <h2 class="px-6 pt-2 font-bold">Representante</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->institucione->representante }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Fecha de suscripción</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->fecha_suscripcion }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Tema</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->tema->nombre }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 mb-6">
            <div class="col-span-2 bg-white border border-gray-300 rounded">
                <h2 class="px-6 pt-2 font-bold">Vigencia</h2>
                
                <p class="px-6 py-2 font-semibold text-gray-700">
                    {{ $documento->vigencia->nombre }}
                </p>
            </div>
        </div>
 
    </div>
</x-app-layout>