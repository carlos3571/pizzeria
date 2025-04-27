<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaSizes = PizzaSize::with('pizza')->get();
        return view('pizza_sizes.index', compact('pizzaSizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = Pizza::all(); // Para seleccionar a qué pizza pertenece
        return view('pizza_sizes.create', compact('pizzas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        PizzaSize::create($request->all());

        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaSize $pizzaSize)
    {
        return view('pizza_sizes.show', compact('pizzaSize'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaSize $pizzaSize)
    {
        $pizzas = Pizza::all();
        return view('pizza_sizes.edit', compact('pizzaSize', 'pizzas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PizzaSize $pizzaSize)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        $pizzaSize->update($request->all());

        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PizzaSize $pizzaSize)
    {
        $pizzaSize->delete();

        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza eliminado exitosamente.');
    }
}
