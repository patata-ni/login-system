<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">Gestión de Usuarios</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-200">
                <h1 class="text-3xl font-black text-gray-900 mb-8">Lista de Usuarios del Sistema</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-lg">
                        <thead class="bg-gradient-to-r from-orange-500 to-red-500 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold">ID</th>
                                <th class="px-6 py-4 text-left font-bold">Nombre</th>
                                <th class="px-6 py-4 text-left font-bold">Email</th>
                                <th class="px-6 py-4 text-left font-bold">Rol</th>
                                <th class="px-6 py-4 text-left font-bold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\User::all() as $user)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-mono">{{ $user->id }}</td>
                                    <td class="px-6 py-4 font-semibold">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-sm font-bold 
                                        @if($user->role === 'administrador') bg-orange-100 text-orange-800 @else bg-green-100 text-green-800 @endif">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl font-semibold mr-2">Editar</button>
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl font-semibold">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

