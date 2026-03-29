<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">Panel de Administración</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto space-y-8 px-6">
            <div class="bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-3xl p-12 shadow-2xl">
                <svg class="w-12 h-12 mx-auto mb-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h1 class="text-4xl font-black text-gray-900 mb-6 text-center">Panel Administrador</h1>
                <p class="text-2xl text-gray-700 text-center mb-12">Gestión completa del sistema y usuarios</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-all duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl mx-auto mb-6 shadow-2xl flex items-center justify-center">
<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 1 1 0 5.292m-4.712 4.712L12 15.44l4.712-4.374 4.71 4.374-4.71 4.372M12 4.354v13.262"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Gestión de Usuarios</h3>
                        <p class="text-gray-700 text-lg text-center">Ver todos los usuarios, editar roles, suspender cuentas</p>
                        <a href="/admin/users" class="mt-6 w-full block bg-orange-600 hover:bg-orange-700 text-white py-4 px-6 rounded-2xl font-bold text-center shadow-lg hover:shadow-orange-500/50 transition-all">Acceder →</a>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-all duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-2xl mx-auto mb-6 shadow-2xl flex items-center justify-center">
<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
</svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Reportes & Logs</h3>
                        <p class="text-gray-700 text-lg text-center">Actividad del sistema, logs de sesiones, estadísticas</p>
                        <a href="/admin/reports" class="mt-6 w-full block bg-purple-600 hover:bg-purple-700 text-white py-4 px-6 rounded-2xl font-bold text-center shadow-lg hover:shadow-purple-500/50 transition-all">Ver Reportes →</a>

                    </div>
                </div>

                <div class="text-center pt-12">
                    <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-12 py-4 rounded-2xl font-bold text-xl shadow-xl hover:shadow-gray-500/50 transform hover:-translate-y-1 transition-all">
                        ← Volver Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

