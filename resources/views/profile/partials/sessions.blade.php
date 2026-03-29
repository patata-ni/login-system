<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">📱 Gestión de Sesiones</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto space-y-8 px-6">
            <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-200">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-black text-gray-900 mb-4">Sesiones Activas</h1>
                    <p class="text-xl text-gray-600">Controla tus dispositivos conectados al sistema</p>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-200 text-green-800 p-6 rounded-2xl shadow-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-200 text-red-800 p-6 rounded-2xl shadow-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Cerrar otras sesiones -->
                <div class="bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-3xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">🔒 Cerrar otras sesiones</h3>
                    <form method="POST" action="{{ route('sessions.logout-other') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-gray-900 font-bold mb-3">Contraseña actual</label>
                            <input type="password" name="password" required 
                                   class="w-full px-6 py-4 border border-gray-300 rounded-2xl focus:ring-4 focus:ring-orange-500 focus:border-orange-500 shadow-lg">
                            @error('password')
                                <p class="text-red-600 mt-2 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-5 px-8 rounded-2xl shadow-2xl hover:shadow-orange-500/50 transform hover:-translate-y-1 transition-all">
                            Cerrar todas las otras sesiones
                        </button>
                    </form>
                </div>

                <!-- Lista de sesiones -->
                <div class="bg-white border border-gray-200 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                        <h3 class="text-2xl font-bold text-white">📋 Sesiones recientes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-8 py-4 text-left text-lg font-bold text-gray-900">Dispositivo</th>
                                    <th class="px-8 py-4 text-left text-lg font-bold text-gray-900">IP</th>
                                    <th class="px-8 py-4 text-left text-lg font-bold text-gray-900">Última actividad</th>
                                    <th class="px-8 py-4 text-left text-lg font-bold text-gray-900">Estado</th>
                                    <th class="px-8 py-4 text-left text-lg font-bold text-gray-900">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($sessions as $session)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 bg-gradient-to-r {{ $session->is_current ? 'from-green-500 to-emerald-500' : 'from-gray-400 to-gray-500' }} rounded-2xl flex items-center justify-center shadow-lg">
                                                    <span class="text-xl font-bold text-white">●</span>
                                                </div>
                                                <div class="ml-4">
                                                    <p class="font-bold text-gray-900">{{ $session->is_current ? 'Esta sesión (Actual)' : 'Otro dispositivo' }}</p>
                                                    <p class="text-sm text-gray-600">{{ $session->user_agent }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 font-mono font-bold text-gray-900">{{ $session->ip_address }}</td>
                                        <td class="px-8 py-6 text-gray-900">
                                            {{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="px-4 py-2 {{ $session->is_current ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} rounded-full font-bold text-sm">
                                                {{ $session->is_current ? 'Activa' : 'Remota' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6">
                                            @if(!$session->is_current)
                                                <form method="POST" action="{{ route('sessions.destroy', $session->id) }}" class="inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-xl font-bold shadow-lg hover:shadow-red-400 transition-all">
                                                        Cerrar
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-green-600 font-bold">Actual</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-8 py-12 text-center">
                                            <div class="text-gray-500">
                                                <div class="w-24 h-24 bg-gray-100 rounded-3xl mx-auto mb-4 flex items-center justify-center">
                                                    <span class="text-3xl">📱</span>
                                                </div>
                                                <h3 class="text-2xl font-bold text-gray-600 mb-2">No hay sesiones remotas</h3>
                                                <p class="text-lg">Solo tienes esta sesión activa</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-12 py-4 rounded-2xl font-bold text-xl shadow-xl hover:shadow-gray-500/50 transition-all">
                    ← Volver Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

