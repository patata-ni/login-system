{{-- Sección para eliminar la cuenta de usuario --}}
<section class="space-y-6">
    {{-- Encabezado de la sección --}}
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }} {{-- Título de la sección --}}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }} {{-- Advertencia --}}
        </p>
    </header>

    {{-- Botón peligroso para abrir el modal de confirmación --}}
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    {{-- Modal de confirmación para eliminar la cuenta --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf {{-- Token CSRF obligatorio --}}
            @method('delete') {{-- Método DELETE para eliminar la cuenta --}}

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }} {{-- Pregunta de confirmación --}}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }} {{-- Advertencia adicional --}}
            </p>

            {{-- Campo para ingresar la contraseña y confirmar la eliminación --}}
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            {{-- Botones para cancelar o confirmar la eliminación --}}
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }} {{-- Botón para cancelar --}}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }} {{-- Botón para eliminar definitivamente --}}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
