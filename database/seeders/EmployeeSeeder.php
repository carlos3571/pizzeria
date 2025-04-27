<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si existe un usuario de tipo empleado
        $user = User::where('role', 'empleado')->first();

        // Si no existe, lo creamos
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Empleado de Prueba',
                'email' => 'empleado@pizzeria.com',
                'password' => bcrypt('password'),
                'role' => 'empleado',
            ]);
        }

        // Creamos el empleado relacionado
        Employee::create([
            'user_id' => $user->id,
            'position' => 'cajero', // Puedes cambiar entre cajero, administrador, cocinero, mensajero
            'identification_number' => '123456789',
            'salary' => 1200.50,
            'hire_date' => now()->subYears(1),
        ]);
    }
}
