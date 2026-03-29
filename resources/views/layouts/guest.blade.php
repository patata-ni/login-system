<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Login') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-indigo-50 via-blue-50 to-slate-100 min-h-screen">
    <div class="relative min-h-screen flex items-center justify-center p-8">
        <div class="w-full max-w-md space-y-8">
            <div class="text-center">
                <h1 class="text-5xl font-black text-gray-900 mb-6 drop-shadow-lg">LoginSecure</h1>
                <p class="text-xl text-gray-600 max-w-md mx-auto">Sistema de autenticación segura con roles avanzados</p>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>

