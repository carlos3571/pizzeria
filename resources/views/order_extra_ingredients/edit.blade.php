@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Relación Orden - Ingrediente Extra</h2>

            <form action="{{ route('order-extra-ingredients.update', $orderExtraIngredient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Orden</label>
                    <select name="order_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}" {{ $orderExtraIngredient->order_id == $order->id ? 'selected' : '' }}>
                                Orden #{{ $order->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Ingrediente Extra</label>
                    <select name="extra_ingredient_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($extraIngredients as $extra)
                            <option value="{{ $extra->id }}" {{ $orderExtraIngredient->extra_ingredient_id == $extra->id ? 'selected' : '' }}>
                                {{ $extra->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Cantidad</label>
                    <input type="number" name="quantity" value="{{ $orderExtraIngredient->quantity }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" min="1" required>
                </div>

                <button type="submit" class="bg-blue-500 ...">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
