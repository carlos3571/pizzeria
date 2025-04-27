<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = [
            'Margarita',
            'Pepperoni',
            'Hawaiana',
            'Cuatro Quesos',
            'Vegetariana',
            'Barbacoa',
        ];

        foreach ($pizzas as $name) {
            Pizza::create([
                'name' => $name,
            ]);
        }
    }
}
