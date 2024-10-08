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
    </head>

<body>

    <div class="flex flex-col min-h-screen bg-gray-100">
        <header class="bg-gray-800 text-gray-200">
            <div class="p-3">
                {{ config('app.name') }}
            </div>
        </header>
        
        <main class="flex-grow container mx-auto p-3">
            {{ $slot }}
        </main>
    
        <footer class="px-3 py-5 bg-gray-800 text-sm text-gray-400 text-center">
            &copy; test
        </footer>
    </div>


</body>

</html>
