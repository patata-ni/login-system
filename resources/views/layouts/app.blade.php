{{-- Layout principal para usuarios autenticados --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Metadatos básicos para compatibilidad y seguridad --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Token CSRF para formularios seguros --}}
    {{-- Título de la página, configurable desde .env --}}
    <title>{{ config('app.name', 'Login Seguro') }}</title>
    {{-- Fuente personalizada desde Bunny Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- Carga de CSS y JS con Vite (Laravel Mix moderno) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-slate-50 via-blue-50 to-slate-100">
    {{-- Barra de navegación superior (menú) --}}
    @include('layouts.navigation')

    {{-- Si existe un slot $header, se muestra como encabezado de la página --}}
    @isset($header)
        <header class="bg-white/80 backdrop-blur-sm shadow-sm border-b">
            <div class="max-w-7xl mx-auto py-8 px-6">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Contenido principal de la página --}}
    <main class="max-w-7xl mx-auto py-12 px-6">
        {{ $slot }} {{-- Aquí se inserta el contenido de cada vista --}}
    </main>
</body>
</html>

