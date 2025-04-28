@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Ingrediente Extra</h2>

            <form action="{{ route('extra-ingredients.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label for="price" class="block text-gray-700 mb-2">Precio</label>
                    <input type="number" name="price" id="price" step="0.01" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required min="0">
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
