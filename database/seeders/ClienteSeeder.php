<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User; 
use App\Models\Cliente;

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Primero verificamos si existen usuarios
        if (User::count() == 0) {
            $user = User::factory()->create([
                'name' => 'Cliente de Prueba',
                'email' => 'cliente@pizzeria.com',
                'password' => bcrypt('password'),
                'role' => 'cliente',
            ]);
        } else {
            $user = User::where('role', 'cliente')->first();
            if (!$user) {
                $user = User::factory()->create([
                    'name' => 'Cliente de Prueba',
                    'email' => 'cliente@pizzeria.com',
                    'password' => bcrypt('password'),
                    'role' => 'cliente',
                ]);
            }
        }

        // Ahora creamos el cliente
        Cliente::create([
            'user_id' => $user->id,
            'address' => 'Calle Falsa 123',
            'phone' => '1234567890',
        ]);
    }
}
