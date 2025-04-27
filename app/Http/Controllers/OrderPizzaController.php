<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use App\Models\Order;
use App\Models\PizzaSize;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderPizzas = OrderPizza::with(['order', 'pizzaSize'])->get();
        return view('order_pizzas.index', compact('orderPizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizzas.create', compact('orders', 'pizzaSizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_size,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderPizza::create($request->all());

        return redirect()->route('order-pizzas.index')->with('success', 'Pizza agregada al pedido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderPizza $orderPizza)
    {
        return view('order_pizzas.show', compact('orderPizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderPizza $orderPizza)
    {
        $orders = Order::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizzas.edit', compact('orderPizza', 'orders', 'pizzaSizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderPizza $orderPizza)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_size,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderPizza->update($request->all());

        return redirect()->route('order-pizzas.index')->with('success', 'Pizza del pedido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderPizza $orderPizza)
    {
        $orderPizza->delete();

        return redirect()->route('order-pizzas.index')->with('success', 'Pizza eliminada del pedido exitosamente.');
    }
}
