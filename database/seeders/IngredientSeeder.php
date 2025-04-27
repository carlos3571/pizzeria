<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            'Queso Mozzarella',
            'Pepperoni',
            'Jamón',
            'Champiñones',
            'Aceitunas Negras',
            'Pimientos Verdes',
            'Cebolla',
            'Tocino',
            'Tomate',
            'Albahaca Fresca'
        ];

        foreach ($ingredients as $name) {
            Ingredient::create([
                'name' => $name
            ]);
        }
    }
}
