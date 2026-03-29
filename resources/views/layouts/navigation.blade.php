<nav class="bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="text-3xl font-black text-blue-700 tracking-tight hover:text-blue-800 transition-all">
            LoginSecure
        </a>

        <div class="flex items-center space-x-6">
            <span class="text-gray-800 font-bold bg-gray-100 px-6 py-2 rounded-2xl shadow-md">
                {{ auth()->user()->name }}
                <span class="ml-2 text-sm font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">
                    {{ ucfirst(auth()->user()->role) }}
                </span>
            </span>

            <a href="{{ route('sessions.index') }}" 
               class="text-blue-700 hover:text-blue-900 font-bold px-8 py-3 bg-blue-100 hover:bg-blue-200 rounded-2xl transition-all hover:shadow-md shadow-sm">
                📱 Sesiones
            </a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold px-10 py-3 rounded-2xl shadow-lg hover:shadow-red-400 transition-all hover:-translate-y-0.5">
                    🚪 Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>

