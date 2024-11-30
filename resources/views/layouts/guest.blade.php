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
    <body class="font-sans text-gray-900 bg-violet-950">
        <!-- Wrapper untuk logo di kiri atas yang fix dan memiliki z-index lebih tinggi -->
        <div class="fixed top-0 left-0 p-6 z-10">
            <a href="/">
                <x-application-logo class="w-12 h-12 fill-current text-white" />
            </a>
        </div>

        <!-- Bagian utama halaman dengan margin dan flex untuk memposisikan di tengah -->
        <div class="flex flex-col items-center justify-center min-h-screen mt-24"> <!-- Menambahkan margin top untuk memberi ruang -->
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
