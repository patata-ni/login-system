<?php

// Definimos el namespace del controlador
namespace App\Http\Controllers;

// Importamos clases necesarias de Laravel
use Illuminate\Http\Request; // Para manejar la petición HTTP
use Illuminate\Http\RedirectResponse; // Para redirecciones
use Illuminate\Support\Facades\Auth; // Para autenticación
use Illuminate\Support\Facades\DB; // Para consultas a la base de datos
use Illuminate\Support\Facades\Session; // Para manejo de sesiones
use Illuminate\View\View; // Para retornar vistas
use Illuminate\Support\Facades\Log; // (No se usa aquí, pero útil para logs)
use Illuminate\Support\Facades\Config; // (No se usa aquí, pero útil para configuración)

/**
 * Controlador para la gestión de sesiones múltiples de usuarios autenticados
 */
class SessionsController extends Controller
{
    /**
     * Muestra la lista de sesiones activas del usuario.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Obtenemos el nombre de la tabla de sesiones y la conexión de base de datos
        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        // Consultamos todas las sesiones del usuario autenticado, ordenadas por última actividad
        $sessions = DB::connection($connection)
            ->table($table)
            ->where('user_id', Auth::id())
            ->orderBy('last_activity', 'desc')
            ->get(['id', 'ip_address', 'user_agent', 'last_activity'])
            ->map(function ($session) use ($request) {
                // Mapeamos los datos para la vista
                return (object) [
                    'id' => $session->id,
                    'ip_address' => $session->ip_address ?? 'N/A', // IP del dispositivo
                    'user_agent' => substr($session->user_agent ?? 'Unknown', 0, 50) . '...', // Navegador/dispositivo
                    'last_activity' => $session->last_activity, // Última actividad
                    'is_current' => $session->id === $request->session()->getId(), // ¿Es la sesión actual?
                ];
            });

        // Retornamos la vista con la lista de sesiones
        return view('profile.partials.sessions', compact('sessions'));
    }

    /**
     * Cierra todas las sesiones del usuario excepto la actual.
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoutOtherDevices(Request $request): RedirectResponse
    {
        // Validamos que el usuario ingrese su contraseña actual
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Obtenemos el ID de la sesión actual
        $currentSession = $request->session()->getId();
        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        // Eliminamos todas las sesiones del usuario excepto la actual
        DB::connection($connection)
            ->table($table)
            ->where('user_id', Auth::id())
            ->where('id', '!=', $currentSession)
            ->delete();

        // Regeneramos la sesión para mayor seguridad
        $request->session()->regenerate();

        // Redirigimos con mensaje de éxito
        return redirect()->route('sessions.index')
            ->with('success', 'Otras sesiones cerradas correctamente.');
    }

    /**
     * Cierra una sesión específica (remota) del usuario.
     * @param string $sessionId
     * @return RedirectResponse
     */
    public function destroy($sessionId): RedirectResponse
    {
        // No se puede cerrar la sesión actual desde aquí
        if ($sessionId === request()->session()->getId()) {
            return redirect()->route('sessions.index')
                ->with('error', 'No puedes cerrar tu sesión actual.');
        }

        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        // Eliminamos la sesión remota seleccionada
        DB::connection($connection)
            ->table($table)
            ->where('id', $sessionId)
            ->where('user_id', Auth::id())
            ->delete();

        // Redirigimos con mensaje de éxito
        return redirect()->route('sessions.index')
            ->with('success', 'Sesión eliminada.');
    }
}

