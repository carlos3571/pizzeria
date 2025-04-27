<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use App\Models\Order;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::with(['order', 'extraIngredient'])->get();
        return view('order_extra_ingredients.index', compact('orderExtraIngredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredients.create', compact('orders', 'extraIngredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderExtraIngredient::create($request->all());

        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra agregado al pedido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderExtraIngredient $orderExtraIngredient)
    {
        return view('order_extra_ingredients.show', compact('orderExtraIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderExtraIngredient $orderExtraIngredient)
    {
        $orders = Order::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredients.edit', compact('orderExtraIngredient', 'orders', 'extraIngredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderExtraIngredient $orderExtraIngredient)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderExtraIngredient->update($request->all());

        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderExtraIngredient $orderExtraIngredient)
    {
        $orderExtraIngredient->delete();

        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra eliminado del pedido exitosamente.');
    }
}
