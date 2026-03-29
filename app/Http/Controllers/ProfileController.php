<?php

// Definimos el namespace del controlador
namespace App\Http\Controllers;

// Importamos clases necesarias
use App\Http\Requests\ProfileUpdateRequest; // Request personalizado para validación de perfil
use Illuminate\Http\RedirectResponse; // Para redirecciones
use Illuminate\Http\Request; // Para manejar la petición HTTP
use Illuminate\Support\Facades\Auth; // Para autenticación
use Illuminate\Support\Facades\Redirect; // Para redirecciones
use Illuminate\View\View; // Para retornar vistas

// Controlador para la gestión del perfil de usuario
class ProfileController extends Controller
{
    /**
     * Muestra el formulario de perfil del usuario.
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        // Retorna la vista de edición de perfil con el usuario autenticado
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Actualiza la información del perfil del usuario.
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Rellena el modelo User con los datos validados del formulario
        $request->user()->fill($request->validated());

        // Si el email fue modificado, se debe volver a verificar
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en la base de datos
        $request->user()->save();

        // Redirige de vuelta al perfil con mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Elimina la cuenta del usuario autenticado.
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valida la contraseña antes de eliminar la cuenta
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Cierra la sesión del usuario
        Auth::logout();

        // Elimina el usuario de la base de datos
        $user->delete();

        // Invalida la sesión y regenera el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página principal
        return Redirect::to('/');
    }
}
