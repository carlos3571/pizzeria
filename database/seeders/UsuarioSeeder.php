<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador Principal',
            'email' => 'admin@pizzeria.com',
            'password' => Hash::make('password123'), // Importante encriptar
            'role' => 'empleado', // Porque tu tabla tiene un campo 'role'
        ]);

        User::create([
            'name' => 'John Alex Castaño',
            'email' => 'cliente@pizzeria.com',
            'password' => Hash::make('password123'), // Importante encriptar
            'role' => 'cliente', // Porque tu tabla tiene un campo 'role'
        ]);

        User::create([
            'name' => 'John  Castaño',
            'email' => 'cliente2@pizzeria.com',
            'password' => Hash::make('password123'), // Importante encriptar
            'role' => 'cliente', // Porque tu tabla tiene un campo 'role'
        ]);
    }
}
