<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return view('extra_ingredients.index', compact('extraIngredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extra_ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        ExtraIngredient::create($request->all());

        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.show', compact('extraIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.edit', compact('extraIngredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExtraIngredient $extraIngredient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $extraIngredient->update($request->all());

        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExtraIngredient $extraIngredient)
    {
        $extraIngredient->delete();

        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra eliminado exitosamente.');
    }
}
