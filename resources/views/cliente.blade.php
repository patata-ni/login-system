<x-app-layout>
    <x-slot name="header">
<svg class="w-12 h-12 inline mb-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 4.5M7 13l-1.5 4.5m11-4.5H9.456m15.544 0H18.456M8 13a1 1 0 01-.956-.728l-.517-2.31a1 1 0 00-.956-.728m6.111 4.584A5 5 0 0112 18.5a5 5 0 01-5.5-4.916m11.5 4.916A5 5 0 0112 18.5a5 5 0 01-5.5-4.916M7 13h10m0 0l-3 3m0 0l3 3m-3-3v6m3-6v6"/>
</svg>
<h2 class="font-bold text-3xl text-gray-900 inline"> Panel de Cliente</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto space-y-8 px-6">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-3xl p-12 shadow-2xl">
                <h1 class="text-4xl font-black text-gray-900 mb-6 text-center">¡Bienvenido Cliente!</h1>
                <p class="text-2xl text-gray-700 text-center mb-12">Accede a tus servicios personalizados</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white border border-gray-200 rounded-3xl p-10 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-all duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl mx-auto mb-8 shadow-2xl flex items-center justify-center">
<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Mi Perfil</h3>
                        <p class="text-gray-700 text-lg text-center mb-8">Consulta y edita tu información personal, preferencias y datos de contacto</p>
                        <a href="{{ route('profile.edit') }}" class="w-full block bg-green-600 hover:bg-green-700 text-white py-4 px-8 rounded-2xl font-bold text-center shadow-lg hover:shadow-green-500/50 transition-all">Gestionar Perfil →</a>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-3xl p-10 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-all duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl mx-auto mb-8 shadow-2xl flex items-center justify-center">
<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Sesiones Activas</h3>
                        <p class="text-gray-700 text-lg text-center mb-8">Revisa y administra todos tus dispositivos conectados al sistema</p>
                        <a href="{{ route('sessions.index') }}" class="w-full block bg-blue-600 hover:bg-blue-700 text-white py-4 px-8 rounded-2xl font-bold text-center shadow-lg hover:shadow-blue-500/50 transition-all">Ver Sesiones →</a>
                    </div>
                </div>

                <div class="text-center pt-12">
                    <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-16 py-5 rounded-2xl font-bold text-xl shadow-xl hover:shadow-gray-500/50 transition-all hover:-translate-y-1">
                        ← Volver Dashboard Principal
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

