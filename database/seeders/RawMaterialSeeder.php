<?php

namespace Database\Seeders;

use App\Models\RawMaterial;
use Illuminate\Database\Seeder;


class RawMaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            ['name' => 'Harina', 'unit' => 'kg', 'current_stock' => 100],
            ['name' => 'Queso Mozzarella', 'unit' => 'kg', 'current_stock' => 50],
            ['name' => 'Salsa de Tomate', 'unit' => 'litros', 'current_stock' => 30],
            ['name' => 'Aceite de Oliva', 'unit' => 'litros', 'current_stock' => 20],
            ['name' => 'Orégano', 'unit' => 'gramos', 'current_stock' => 10],
        ];

        foreach ($materials as $material) {
            RawMaterial::create($material);
        }
    }
}
