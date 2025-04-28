<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Puedes descomentar si no usas eventos
use Illuminate\Database\Seeder;
use App\Models\Branch; // Asegúrate de importar el modelo Branch
use Faker\Factory as Faker; // Importa Faker para datos de ejemplo

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Limpia la tabla antes de llenarla (opcional, útil con migrate:fresh)
        // Branch::truncate(); // Descomenta si quieres borrar datos previos al ejecutar solo este seeder

        $faker = Faker::create('es_ES'); // Usar Faker en español para direcciones más locales

        // Crear algunas sucursales de ejemplo
        Branch::create([
            'name' => 'Pizzería Central',
            'address' => $faker->address, // Genera una dirección falsa
        ]);

        Branch::create([
            'name' => 'Sucursal Norte',
            'address' => $faker->address,
        ]);

        Branch::create([
            'name' => 'Sucursal Playa',
            'address' => $faker->streetAddress . ', ' . $faker->city, // Otra forma de generar dirección
        ]);

        // Puedes añadir más si lo necesitas
        // for($i=0; $i<5; $i++) {
        //     Branch::create([
        //         'name' => 'Sucursal ' . $faker->city,
        //         'address' => $faker->address,
        //     ]);
        // }

        $this->command->info('Tabla Branches llenada con datos de ejemplo.'); // Mensaje informativo
    }
}