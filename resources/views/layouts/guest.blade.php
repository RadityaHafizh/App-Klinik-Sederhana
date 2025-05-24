<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Klinik App') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-base-200 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
        <div class="flex justify-center">
            {{-- Ganti dengan logo klinik jika ada --}}
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" class="w-72 h-72">
            </a>
        </div>
        <h1 class="text-3xl font-semibold text-center mb-6 text-primary">Login Aplikasi Klinik</h1>

        <div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
