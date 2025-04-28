<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\ExtraIngredient;
use App\Models\OrderExtraIngredient;

class OrderExtraIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $extras = ExtraIngredient::all();

        if ($orders->isEmpty() || $extras->isEmpty()) {
            $this->command->warn('Se necesitan órdenes y extras para crear relaciones en order_extra_ingredients.');
            return;
        }

        foreach ($orders as $order) {
            // Asignamos 1 a 3 ingredientes extra a cada orden
            $selectedExtras = $extras->random(rand(1, 3));

            foreach ($selectedExtras as $extra) {
                OrderExtraIngredient::create([
                    'order_id' => $order->id,
                    'extra_ingredient_id' => $extra->id,
                    'quantity' => rand(1, 5), // entre 1 y 5 extras
                ]);
            }
        }
    }
}
