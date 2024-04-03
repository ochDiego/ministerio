<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link rel="shortcut icon" href="{{ asset('icon.jpg') }}" class="object-fit">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="flex flex-col items-center justify-between px-4 py-12 mx-auto max-w-7xl md:flex-row">
            <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0">© Copyright 2024 ISFTANGACO | Desarrolladores: Lorena, Braian, Luciano, Maxi, Diego. Todos los derechos reservados.</p>
            <div class="flex items-center space-x-6">
             
            </div>
          </footer>
          

        @stack('modals')

        @livewireScripts
    </body>
</html>
