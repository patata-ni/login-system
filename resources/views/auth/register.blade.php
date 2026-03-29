{{-- Layout de invitado, envuelve el formulario de registro --}}
<x-guest-layout>
    {{-- Formulario de registro, método POST para enviar datos --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf {{-- Token de seguridad, obligatorio para evitar ataques CSRF --}}

        {{-- Campo para el nombre del usuario --}}
        <div>
            {{-- Etiqueta personalizada, se puede cambiar el texto si se quiere --}}
            <x-input-label for="name" :value="__('Name')" />
            {{-- Input de texto para el nombre, recupera el valor anterior si hubo error --}}
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            {{-- Muestra errores de validación para el nombre --}}
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Campo para el correo electrónico --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Campo para la contraseña --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirmación de contraseña, importante para evitar errores de tipeo --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Selección de rol, importante para la lógica de permisos --}}
        <div class="mt-4">
            <x-input-label for="role" :value="__('Rol')" />
            {{-- Select para elegir el rol, no olvidar validar en el backend --}}
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="cliente">Cliente</option> {{-- Por defecto, cliente --}}
                <option value="administrador">Administrador</option> {{-- Solo dar a usuarios de confianza --}}
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        {{-- Enlaces y botón de registro --}}
        <div class="flex items-center justify-end mt-4">
            {{-- Enlace para ir a login si ya está registrado --}}
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            {{-- Botón para enviar el formulario de registro --}}
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
