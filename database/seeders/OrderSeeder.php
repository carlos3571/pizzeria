<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Cliente;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si existen clientes y sucursales
        $clientes = Cliente::all();
        $branches = Branch::all();
        $employees = Employee::all();
        
        if ($clientes->isEmpty() || $branches->isEmpty()) {
            $this->command->warn('🚫 Se necesitan clientes y sucursales para crear órdenes.');
            return;
        }

        // Usar Faker para datos más variados
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $i) {
            Order::create([
                'client_id' => $clientes->random()->id,
                'branch_id' => $branches->random()->id,
                'total_price' => $faker->randomFloat(2, 30, 300), // Precios entre 30 y 300
                'status' => $faker->randomElement(['pendiente', 'en_preparacion', 'listo', 'entregado']),
                'delivery_type' => $faker->randomElement(['en_local', 'a_domicilio']),
                'delivery_person_id' => $employees->isEmpty() ? null : $employees->random()->id,
            ]);
        }
    }
}
