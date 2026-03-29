{{-- Layout de invitado, no olvidar que esto envuelve todo el contenido de la página de login --}}
<x-guest-layout>
    {{-- Contenedor principal centrado --}}
    <div class="max-w-md mx-auto space-y-8">
        {{-- Muestra mensajes de sesión, como errores o confirmaciones. Cambiar estilos si se quiere otro color --}}
        <x-auth-session-status class="mb-8 text-red-600 bg-red-50 p-4 rounded-xl" :status="session('status')" />

        {{-- Formulario de login, método POST para enviar datos de acceso --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-6 bg-white/60 backdrop-blur-md rounded-3xl p-10 shadow-2xl border border-gray-200">
            @csrf {{-- Token de seguridad, no olvidar dejarlo siempre para evitar ataques CSRF --}}

            {{-- Campo de correo electrónico --}}
            <div>
                {{-- Etiqueta visible para el usuario --}}
                Correo electrónico {{-- No olvidar traducir si el sistema es multilenguaje --}}
                {{-- Input para el email, con validación HTML y recuperación del valor anterior si hubo error --}}
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       class="w-full px-6 py-4 border border-gray-300 rounded-2xl focus:ring-4 focus:ring-blue-500 focus:border-blue-500 text-lg transition-all shadow-lg hover:shadow-xl">
                {{-- Muestra el error de validación si existe --}}
                @error('email')
                    <p class="text-red-600 mt-2 text-sm font-bold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Campo de contraseña --}}
            <div>
                {{-- Etiqueta con icono, se puede personalizar --}}
                <label class="block text-gray-900 font-bold mb-3 text-xl">🔒 Contraseña</label>
                {{-- Input para la contraseña, tipo password para ocultar caracteres --}}
                <input type="password" name="password" required 
                       class="w-full px-6 py-4 border border-gray-300 rounded-2xl focus:ring-4 focus:ring-blue-500 focus:border-blue-500 text-lg transition-all shadow-lg hover:shadow-xl">
                {{-- Muestra el error de validación si existe --}}
                @error('password')
                    <p class="text-red-600 mt-2 text-sm font-bold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Recordarme y enlace para recuperar contraseña --}}
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    {{-- Checkbox para recordar sesión, importante para experiencia de usuario --}}
                    <input type="checkbox" name="remember" class="w-5 h-5 rounded border-gray-300">
                    <span class="ml-2 text-gray-900 font-medium">Recordarme</span>
                </label>
                {{-- Enlace para recuperar contraseña, no olvidar configurar el correo en .env --}}
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-bold">¿Olvidaste contraseña?</a>
            </div>

            {{-- Botón para enviar el formulario de login --}}
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-5 px-8 rounded-2xl text-xl shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 transition-all duration-300">
                🚀 Iniciar Sesión {{-- Cambiar icono o texto si se quiere personalizar --}}
            </button>
        </form>

        {{-- Enlace para registro, útil para nuevos usuarios --}}
        <div class="text-center pt-8">
            <p class="text-gray-700">
                ¿Nuevo? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-bold">Regístrate aquí</a>
            </p>
        </div>
    </div>
</x-guest-layout>

