<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            BranchSeeder::class,
            ClienteSeeder::class,
            EmployeeSeeder::class,
            IngredientSeeder::class,
            RawMaterialSeeder::class,
            PizzaSeeder::class,
            PizzaSizeSeeder::class,
            PizzaIngredientSeeder::class,
            ExtraIngredientSeeder::class,
            OrderSeeder::class,
            OrderPizzaSeeder::class,


        ]);
    }
}

