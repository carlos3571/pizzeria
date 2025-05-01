<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User; 
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Cliente::all();
        return view('clientes.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $users = User::all();
        return view('clientes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $client)
    {
        $users = User::all();
        return view('clientes.show', compact('client','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $client)
    {
        $users = User::all();
        return view('clientes.edit', compact('client', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $client)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
