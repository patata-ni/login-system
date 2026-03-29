`<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8 px-6">
            <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-200">
                <h1 class="text-4xl font-black text-gray-900 mb-4">¡Bienvenido {{ auth()->user()->name }}!</h1>
                <p class="text-2xl text-gray-600 mb-8">Sistema de login seguro • Rol: <span class="font-bold text-blue-600 text-2xl">{{ ucfirst(auth()->user()->role) }}</span></p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200 rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl mx-auto mb-6 shadow-lg flex items-center justify-center">
<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center">Perfil</h3>
                        <p class="text-gray-700 text-lg text-center">Gestiona tu información personal</p>
                    </div>

                    <div class="group bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl mx-auto mb-6 shadow-lg flex items-center justify-center">
<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 4.84A2 2 0 0012 13a2 2 0 001.73-1.16L21 8M3 21h18M16.5 17.25A4.5 4.5 0 0012 13.5a4.5 4.5 0 00-4.5 4.5v.75"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center truncate">{{ auth()->user()->email }}</h3>
                        <p class="text-gray-700 text-lg text-center">Correo verificado</p>
                    </div>

                    <div class="group bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl mx-auto mb-6 shadow-lg flex items-center justify-center">
<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center uppercase tracking-wide">{{ auth()->user()->role }}</h3>
                        <p class="text-gray-700 text-lg text-center">Rol de acceso</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-6 pt-12 justify-center">
                    <a href="{{ route('sessions.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-2 transition-all duration-300">
                        📱 Gestión de Sesiones Activas
                    </a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.home') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:shadow-orange-500/50 transform hover:-translate-y-2 transition-all duration-300">
                            ⚙️ Panel de Administración
                        </a>
                    @endif

                    @if(!auth()->user()->isAdmin())
                    <a href="{{ route('cliente.home') }}" class="bg-green-500 hover:bg-green-600 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:shadow-green-500/50 transform hover:-translate-y-2 transition-all duration-300">
                        🛒 Panel de Cliente
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

