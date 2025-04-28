<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscamos todos los usuarios con rol 'cliente'
        $clientes = User::where('role', 'cliente')->get();

        if ($clientes->isEmpty()) {
            $this->command->warn('No existen usuarios con rol cliente para crear registros en la tabla clientes.');
            return;
        }

        foreach ($clientes as $user) {
            // Para cada usuario cliente creamos su cliente
            Cliente::updateOrCreate(
                ['user_id' => $user->id], // Condición para actualizar si ya existe
                [
                    'address' => 'Calle Principal #' . $user->id,
                    'phone' => '312000' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                ]
            );
        }
    }
}
