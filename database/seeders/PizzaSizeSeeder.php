<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza; // <---- Faltaba esta línea
use App\Models\PizzaSize; // <---- También asegurémonos de importar PizzaSize

class PizzaSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificamos que existan pizzas
        $pizzas = Pizza::all();

        if ($pizzas->isEmpty()) {
            $this->command->warn('No hay pizzas disponibles para asignar tamaños. Seeder de pizza_sizes cancelado.');
            return;
        }

        // Para cada pizza existente, creamos los tamaños
        foreach ($pizzas as $pizza) {
            PizzaSize::create([
                'pizza_id' => $pizza->id,
                'size' => 'pequeña',
                'price' => 25.00,
            ]);

            PizzaSize::create([
                'pizza_id' => $pizza->id,
                'size' => 'mediana',
                'price' => 40.00,
            ]);

            PizzaSize::create([
                'pizza_id' => $pizza->id,
                'size' => 'grande',
                'price' => 60.00,
            ]);
        }
    }
}
