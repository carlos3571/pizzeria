<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use App\Models\Pizza;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::with(['pizza', 'rawMaterial'])->get();
        return view('pizza_raw_materials.index', compact('pizzaRawMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.create', compact('pizzas', 'rawMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        PizzaRawMaterial::create($request->all());

        return redirect()->route('pizza-raw-materials.index')->with('success', 'Materia prima asignada a pizza exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaRawMaterial $pizzaRawMaterial)
    {
        return view('pizza_raw_materials.show', compact('pizzaRawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.edit', compact('pizzaRawMaterial', 'pizzas', 'rawMaterials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PizzaRawMaterial $pizzaRawMaterial)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $pizzaRawMaterial->update($request->all());

        return redirect()->route('pizza-raw-materials.index')->with('success', 'Materia prima de pizza actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzaRawMaterial->delete();

        return redirect()->route('pizza-raw-materials.index')->with('success', 'Materia prima eliminada de la pizza exitosamente.');
    }
}
