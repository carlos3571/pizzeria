@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
            <!-- Clientes -->
            <a href="{{ route('clients.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Clientes</h3>
                <p class="text-sm text-gray-500">Administrar Clientes</p>
            </a>

            <!-- Sucursales -->
            <a href="{{ route('branches.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Sucursales</h3>
                <p class="text-sm text-gray-500">Administrar Sucursales</p>
            </a>

            <!-- Empleados -->
            <a href="{{ route('employees.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Empleados</h3>
                <p class="text-sm text-gray-500">Administrar Empleados</p>
            </a>

            <!-- Ingredientes -->
            <a href="{{ route('ingredients.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Ingredientes</h3>
                <p class="text-sm text-gray-500">Administrar Ingredientes</p>
            </a>

            <!-- Materias Primas -->
            <a href="{{ route('raw-materials.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Materias Primas</h3>
                <p class="text-sm text-gray-500">Administrar Materias Primas</p>
            </a>

            <!-- Pizzas -->
            <a href="{{ route('pizzas.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Pizzas</h3>
                <p class="text-sm text-gray-500">Administrar Pizzas</p>
            </a>

            <!-- Órdenes -->
            <a href="{{ route('orders.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Órdenes</h3>
                <p class="text-sm text-gray-500">Administrar Órdenes</p>
            </a>

            <!-- Compras -->
            <a href="{{ route('purchases.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Compras</h3>
                <p class="text-sm text-gray-500">Registrar Compras</p>
            </a>

            <!-- Proveedores -->
            <a href="{{ route('suppliers.index') }}" class="block bg-white p-6 rounded-lg shadow hover:bg-gray-100">
                <h3 class="text-lg font-bold text-gray-700">Proveedores</h3>
                <p class="text-sm text-gray-500">Administrar Proveedores</p>
            </a>

        </div>
    </div>
</div>
@endsection
