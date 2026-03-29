<x-guest-layout>
    <div class="max-w-md mx-auto space-y-8">
        <x-auth-session-status class="mb-8 text-red-600 bg-red-50 p-4 rounded-xl" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6 bg-white/60 backdrop-blur-md rounded-3xl p-10 shadow-2xl border border-gray-200">
            @csrf

            <div>
Correo electrónico
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       class="w-full px-6 py-4 border border-gray-300 rounded-2xl focus:ring-4 focus:ring-blue-500 focus:border-blue-500 text-lg transition-all shadow-lg hover:shadow-xl">
                @error('email')
                    <p class="text-red-600 mt-2 text-sm font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-900 font-bold mb-3 text-xl">🔒 Contraseña</label>
                <input type="password" name="password" required 
                       class="w-full px-6 py-4 border border-gray-300 rounded-2xl focus:ring-4 focus:ring-blue-500 focus:border-blue-500 text-lg transition-all shadow-lg hover:shadow-xl">
                @error('password')
                    <p class="text-red-600 mt-2 text-sm font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="w-5 h-5 rounded border-gray-300">
                    <span class="ml-2 text-gray-900 font-medium">Recordarme</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-bold">¿Olvidaste contraseña?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-5 px-8 rounded-2xl text-xl shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 transition-all duration-300">
                🚀 Iniciar Sesión
            </button>
        </form>

        <div class="text-center pt-8">
            <p class="text-gray-700">
                ¿Nuevo? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-bold">Regístrate aquí</a>
            </p>
        </div>
    </div>
</x-guest-layout>

