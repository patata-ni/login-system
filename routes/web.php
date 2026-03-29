<?php

// Importamos los controladores y la clase Route de Laravel
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta principal: si el usuario está autenticado, lo manda al dashboard; si no, al login
Route::get('/', function () {
    if (auth()->check()) { // ¿Está logueado?
        return redirect()->route('dashboard'); // Sí: dashboard
    }
    return redirect()->route('login'); // No: login
});

// Ruta del dashboard principal, protegida por autenticación y verificación de email
Route::get('/dashboard', function () {
    return view('dashboard'); // Muestra la vista dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas que requieren estar autenticado
Route::middleware('auth')->group(function () {
    // Perfil de usuario: editar, actualizar y eliminar
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Gestión de sesiones múltiples (multi-sesiones)
    Route::get('/sessions', [App\Http\Controllers\SessionsController::class, 'index'])->name('sessions.index'); // Ver sesiones activas
    Route::post('/sessions/logout-other', [App\Http\Controllers\SessionsController::class, 'logoutOtherDevices'])->name('sessions.logout-other'); // Cerrar otras sesiones
    Route::delete('/sessions/{sessionId}', [App\Http\Controllers\SessionsController::class, 'destroy'])->name('sessions.destroy'); // Cerrar sesión específica
});

// Incluimos las rutas de autenticación generadas por Breeze (login, register, etc.)
require __DIR__.'/auth.php';

// Rutas protegidas solo para administradores
Route::middleware(['auth', 'role:administrador'])->group(function () {
    // Panel de administración
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.home');
    
    // Gestión de usuarios (solo admin)
    Route::get('/admin/users', function () {
        return view('admin.users');
    });
    
    // Reportes y logs (solo admin)
    Route::get('/admin/reports', function () {
        return view('admin.reports');
    });
});

// Rutas protegidas solo para clientes
Route::middleware(['auth', 'role:cliente'])->group(function () {
    // Panel de cliente
    Route::get('/cliente', function () {
        return view('cliente');
    })->name('cliente.home');
});
