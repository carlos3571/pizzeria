<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExtraIngredient;

class ExtraIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extras = [
            ['name' => 'Extra Queso', 'price' => 3.50],
            ['name' => 'Tocineta', 'price' => 4.00],
            ['name' => 'Champiñones', 'price' => 2.50],
            ['name' => 'Aceitunas', 'price' => 2.00],
            ['name' => 'Cebolla Caramelizada', 'price' => 3.00],
        ];

        foreach ($extras as $extra) {
            ExtraIngredient::create($extra);
        }
    }
}
