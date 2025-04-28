<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\PizzaIngredient;

class PizzaIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();

        if ($pizzas->isEmpty() || $ingredients->isEmpty()) {
            $this->command->info('No hay pizzas o ingredientes disponibles para asignar.');
            return;
        }

        foreach ($pizzas as $pizza) {
            // Asignamos 2 a 4 ingredientes aleatorios a cada pizza
            $assignedIngredients = $ingredients->random(rand(2, 4));

            foreach ($assignedIngredients as $ingredient) {
                PizzaIngredient::create([
                    'pizza_id' => $pizza->id,
                    'ingredient_id' => $ingredient->id,
                ]);
            }
        }
    }
}
