<?php

// Definimos el namespace para organizar el middleware
namespace App\Http\Middleware;

// Importamos clases necesarias
use Closure; // Para manejar la siguiente acción en la cadena de middlewares
use Illuminate\Http\Request; // Para acceder a la petición HTTP
use Symfony\Component\HttpFoundation\Response; // Para el tipo de respuesta
use Illuminate\Support\Facades\Auth; // (No se usa aquí, pero útil si se requiere autenticación)

// Middleware personalizado para restringir acceso según el rol del usuario
class RoleMiddleware
{
    /**
     * Maneja una petición entrante y verifica el rol del usuario.
     *
     * @param  \Illuminate\Http\Request  $request  La petición HTTP entrante
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next  Siguiente middleware/controlador
     * @param  string|array  ...$roles  Lista de roles permitidos para la ruta
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Obtenemos el usuario autenticado de la petición
        $user = $request->user();

        // Si no hay usuario autenticado o su rol no está en la lista de roles permitidos
        if (! $user || ! in_array($user->role, $roles)) {
            // Abortamos la petición con error 403 (prohibido) y mensaje personalizado
            abort(403, 'Acceso denegado. Rol requerido: ' . implode(', ', $roles));
        }

        // Si el usuario tiene el rol correcto, continuamos con la petición
        return $next($request);
    }
}

