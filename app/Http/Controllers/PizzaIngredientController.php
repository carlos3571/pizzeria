<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::with(['pizza', 'ingredient'])->get();
        return view('pizza_ingredients.index', compact('pizzaIngredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.create', compact('pizzas', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        PizzaIngredient::create($request->all());

        return redirect()->route('pizza-ingredients.index')->with('success', 'Ingrediente asignado a pizza exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaIngredient $pizzaIngredient)
    {
        return view('pizza_ingredients.show', compact('pizzaIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaIngredient $pizzaIngredient)
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.edit', compact('pizzaIngredient', 'pizzas', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PizzaIngredient $pizzaIngredient)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient->update($request->all());

        return redirect()->route('pizza-ingredients.index')->with('success', 'Ingrediente de pizza actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PizzaIngredient $pizzaIngredient)
    {
        $pizzaIngredient->delete();

        return redirect()->route('pizza-ingredients.index')->with('success', 'Ingrediente de pizza eliminado exitosamente.');
    }
}
