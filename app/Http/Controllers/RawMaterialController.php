<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return view('raw_materials.index', compact('rawMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('raw_materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
        ]);

        RawMaterial::create($request->all());

        return redirect()->route('raw-materials.index')->with('success', 'Materia prima creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RawMaterial $rawMaterial)
    {
        return view('raw_materials.show', compact('rawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawMaterial $rawMaterial)
    {
        return view('raw_materials.edit', compact('rawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
        ]);

        $rawMaterial->update($request->all());

        return redirect()->route('raw-materials.index')->with('success', 'Materia prima actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();

        return redirect()->route('raw-materials.index')->with('success', 'Materia prima eliminada exitosamente.');
    }
}
