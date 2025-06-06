<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Pizza::create($request->all());

        return redirect()->route('pizzas.index')->with('success', 'Pizza creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        return view('pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        return view('pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza->update($request->all());

        return redirect()->route('pizzas.index')->with('success', 'Pizza actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizzas.index')->with('success', 'Pizza eliminada exitosamente.');
    }
}
