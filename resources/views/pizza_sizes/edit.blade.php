@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Tamaño de Pizza</h2>

            <form action="{{ route('pizza-sizes.update', $pizzaSize->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="pizza_id" class="block text-gray-700 mb-2">Pizza</label>
                    <select name="pizza_id" id="pizza_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($pizzas as $pizza)
                            <option value="{{ $pizza->id }}" {{ $pizzaSize->pizza_id == $pizza->id ? 'selected' : '' }}>
                                {{ $pizza->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="size" class="block text-gray-700 mb-2">Tamaño</label>
                    <select name="size" id="size" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="pequeña" {{ $pizzaSize->size == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                        <option value="mediana" {{ $pizzaSize->size == 'mediana' ? 'selected' : '' }}>Mediana</option>
                        <option value="grande" {{ $pizzaSize->size == 'grande' ? 'selected' : '' }}>Grande</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="price" class="block text-gray-700 mb-2">Precio</label>
                    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $pizzaSize->price) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required min="0">
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
