<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">Reportes y Logs</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-200">
                <h1 class="text-3xl font-black text-gray-900 mb-8">Panel de Reportes del Sistema</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-br from-purple-50 to-indigo-50 border border-purple-200 rounded-2xl p-8 shadow-xl">
                        <h3 class="text-xl font-bold text-purple-900 mb-4">Usuarios Totales</h3>
                        <p class="text-4xl font-black text-purple-600">{{ \App\Models\User::count() }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-8 shadow-xl">
                        <h3 class="text-xl font-bold text-green-900 mb-4">Sesiones Activas</h3>
                        <p class="text-4xl font-black text-green-600">{{ DB::table('sessions')->whereNotNull('user_id')->count() }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 border border-orange-200 rounded-2xl p-8 shadow-xl">
                        <h3 class="text-xl font-bold text-orange-900 mb-4">Administradores</h3>
                        <p class="text-4xl font-black text-orange-600">{{ \App\Models\User::where('role', 'administrador')->count() }}</p>
                    </div>
                </div>
                
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Logs Recientes</h3>
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <p class="text-gray-600 text-lg">Logs del sistema disponibles en <code>storage/logs/laravel.log</code></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

