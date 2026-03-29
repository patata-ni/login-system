<?php

// Definimos el namespace para organizar el código y evitar conflictos
namespace App\Models;

// Importamos clases necesarias de Laravel y del sistema
// use Illuminate\Contracts\Auth\MustVerifyEmail; // (comentado, se puede usar si se requiere verificación de email)
use Database\Factories\UserFactory; // Para las factories de pruebas
use Illuminate\Database\Eloquent\Factories\HasFactory; // Trait para usar factories
use Illuminate\Foundation\Auth\User as Authenticatable; // Clase base de usuario autenticable
use Illuminate\Notifications\Notifiable; // Trait para notificaciones

// Definimos la clase User, que representa a los usuarios en la base de datos
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; // Traits para funcionalidades extra

    /**
     * Atributos que se pueden asignar en masa (mass assignment).
     * Es importante para la seguridad, solo estos campos se pueden llenar automáticamente.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nombre del usuario
        'email',     // Correo electrónico
        'password',  // Contraseña (encriptada)
        'role',      // Rol del usuario (administrador o cliente)
    ];

    /**
     * Verifica si el usuario es administrador.
     * Devuelve true si el rol es 'administrador'.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'administrador';
    }

    /**
     * Verifica si el usuario es cliente.
     * Devuelve true si el rol es 'cliente'.
     */
    public function isCliente(): bool
    {
        return $this->role === 'cliente';
    }

    /**
     * Atributos que se ocultan al serializar el modelo (por ejemplo, al convertir a JSON).
     * Por seguridad, nunca se deben exponer la contraseña ni el token de sesión.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // Nunca mostrar la contraseña
        'remember_token',  // Token de "recuérdame"
    ];

    /**
     * Define los atributos que deben ser convertidos a tipos nativos.
     * Por ejemplo, fechas o contraseñas encriptadas.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convierte la fecha de verificación a objeto DateTime
            'password' => 'hashed',            // Indica que la contraseña debe estar hasheada
        ];
    }
}
