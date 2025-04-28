<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\PizzaSize;
use App\Models\OrderPizza;

class OrderPizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $pizzaSizes = PizzaSize::all();

        if ($orders->isEmpty() || $pizzaSizes->isEmpty()) {
            $this->command->warn('Se necesitan órdenes y tamaños de pizzas para crear registros en order_pizzas.');
            return;
        }

        foreach ($orders as $order) {
            // Cada orden tendrá entre 1 y 3 tipos de pizzas distintas
            $assignedPizzas = $pizzaSizes->random(rand(1, 3));

            foreach ($assignedPizzas as $pizzaSize) {
                OrderPizza::create([
                    'order_id' => $order->id,
                    'pizza_size_id' => $pizzaSize->id,
                    'quantity' => rand(1, 5), // Entre 1 y 5 pizzas por tamaño
                ]);
            }
        }
    }
}