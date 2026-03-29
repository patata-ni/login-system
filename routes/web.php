<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Multi-sessions management
    Route::get('/sessions', [App\Http\Controllers\SessionsController::class, 'index'])->name('sessions.index');
    Route::post('/sessions/logout-other', [App\Http\Controllers\SessionsController::class, 'logoutOtherDevices'])->name('sessions.logout-other');
    Route::delete('/sessions/{sessionId}', [App\Http\Controllers\SessionsController::class, 'destroy'])->name('sessions.destroy');
});

require __DIR__.'/auth.php';

// Ejemplo de rutas protegidas por rol
Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.home');
    
    Route::get('/admin/users', function () {
        return view('admin.users');
    });
    
    Route::get('/admin/reports', function () {
        return view('admin.reports');
    });
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/cliente', function () {
        return view('cliente');
    })->name('cliente.home');
});
