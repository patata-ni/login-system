<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

/**
 * Gestión de sesiones múltiples para usuarios autenticados
 */
class SessionsController extends Controller
{
    public function index(Request $request): View
    {
        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        $sessions = DB::connection($connection)
            ->table($table)
            ->where('user_id', Auth::id())
            ->orderBy('last_activity', 'desc')
            ->get(['id', 'ip_address', 'user_agent', 'last_activity'])
            ->map(function ($session) use ($request) {
                return (object) [
                    'id' => $session->id,
                    'ip_address' => $session->ip_address ?? 'N/A',
                    'user_agent' => substr($session->user_agent ?? 'Unknown', 0, 50) . '...',
                    'last_activity' => $session->last_activity,
                    'is_current' => $session->id === $request->session()->getId(),
                ];
            });

        return view('profile.partials.sessions', compact('sessions'));
    }

    public function logoutOtherDevices(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $currentSession = $request->session()->getId();
        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        DB::connection($connection)
            ->table($table)
            ->where('user_id', Auth::id())
            ->where('id', '!=', $currentSession)
            ->delete();

        $request->session()->regenerate();

        return redirect()->route('sessions.index')
            ->with('success', 'Otras sesiones cerradas correctamente.');
    }

    public function destroy($sessionId): RedirectResponse
    {
        if ($sessionId === request()->session()->getId()) {
            return redirect()->route('sessions.index')
                ->with('error', 'No puedes cerrar tu sesión actual.');
        }

        $table = config('session.table', 'sessions');
        $connection = config('session.connection') ?: config('database.default');

        DB::connection($connection)
            ->table($table)
            ->where('id', $sessionId)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('sessions.index')
            ->with('success', 'Sesión eliminada.');
    }
}

