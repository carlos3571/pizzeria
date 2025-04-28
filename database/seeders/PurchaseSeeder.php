<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use Carbon\Carbon;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        $rawMaterials = RawMaterial::all();

        if ($suppliers->isEmpty() || $rawMaterials->isEmpty()) {
            $this->command->info('Se necesitan proveedores y materias primas para crear compras.');
            return;
        }

        foreach (range(1, 5) as $i) {
            Purchase::create([
                'supplier_id' => $suppliers->random()->id,
                'raw_material_id' => $rawMaterials->random()->id,
                'quantity' => rand(10, 100),
                'purchase_price' => rand(500, 5000) / 10, // Ejemplo: precios entre 50 y 500
                'purchase_date' => Carbon::now()->subDays(rand(0, 30)), // Fecha aleatoria hasta 30 días atrás
            ]);
        }
    }
}
