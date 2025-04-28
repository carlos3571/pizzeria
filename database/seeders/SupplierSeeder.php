<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::insert([
            [
                'name' => 'Proveedor de Quesos S.A.',
                'contact_info' => 'quesos@proveedores.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carnes Premium Ltda.',
                'contact_info' => 'carnes@premium.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Verduras Frescas SAS',
                'contact_info' => 'contacto@verdurasfrescas.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
