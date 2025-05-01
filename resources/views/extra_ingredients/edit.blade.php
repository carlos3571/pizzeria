@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Ingrediente Extra</h2>

            <form action="{{ route('extra-ingredients.update', $extraIngredient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $extraIngredient->name) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label for="price" class="block text-gray-700 mb-2">Precio</label>
                    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $extraIngredient->price) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required min="0">
                </div>

                <button type="submit" class="bg-blue-500 ...">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
