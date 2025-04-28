<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\RawMaterial;
use App\Models\PizzaRawMaterial;

class PizzaRawMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();

        if ($pizzas->isEmpty() || $rawMaterials->isEmpty()) {
            $this->command->info('Se necesitan pizzas y materias primas para asociarlas.');
            return;
        }

        foreach ($pizzas as $pizza) {
            // Cada pizza tendrá entre 1 y 3 materias primas asociadas
            $selectedRawMaterials = $rawMaterials->random(rand(1, 3));

            foreach ($selectedRawMaterials as $material) {
                PizzaRawMaterial::create([
                    'pizza_id' => $pizza->id,
                    'raw_material_id' => $material->id,
                    'quantity' => rand(50, 500) / 100, // Ejemplo: cantidades entre 0.5 y 5.0
                ]);
            }
        }
    }
}
