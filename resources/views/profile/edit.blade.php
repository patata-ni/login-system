{{-- Layout principal para la edición de perfil --}}
<x-app-layout>
    {{-- Slot para el encabezado de la página --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }} {{-- Título de la página --}}
        </h2>
    </x-slot>

    {{-- Contenedor principal con padding vertical --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Sección para actualizar información del perfil --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form') {{-- Formulario de actualización de datos --}}
                </div>
            </div>

            {{-- Sección para cambiar la contraseña --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form') {{-- Formulario de cambio de contraseña --}}
                </div>
            </div>

            {{-- Sección para eliminar la cuenta de usuario --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form') {{-- Formulario de eliminación de cuenta --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
