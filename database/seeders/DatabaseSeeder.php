<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Test users for different roles
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Cliente User',
            'email' => 'cliente@example.com',
            'password' => bcrypt('password'),
            'role' => 'cliente',
        ]);

        // Uncomment for more test users
        // User::factory(8)->create();
    }
}
