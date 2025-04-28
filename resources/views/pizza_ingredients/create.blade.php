@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Asignar Ingrediente a Pizza</h2>

            <form action="{{ route('pizza-ingredients.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="pizza_id" class="block text-gray-700 mb-2">Pizza</label>
                    <select name="pizza_id" id="pizza_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($pizzas as $pizza)
                            <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="ingredient_id" class="block text-gray-700 mb-2">Ingrediente</label>
                    <select name="ingredient_id" id="ingredient_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Asignar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
