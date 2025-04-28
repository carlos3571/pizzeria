@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Relación Pizza-Orden</h2>

            <form action="{{ route('order-pizzas.update', $orderPizza->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Orden</label>
                    <select name="order_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}" {{ $order->id == $orderPizza->order_id ? 'selected' : '' }}>
                                #{{ $order->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Pizza Tamaño</label>
                    <select name="pizza_size_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach($pizzaSizes as $size)
                            <option value="{{ $size->id }}" {{ $size->id == $orderPizza->pizza_size_id ? 'selected' : '' }}>
                                {{ $size->pizza->name }} - {{ ucfirst($size->size) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Cantidad</label>
                    <input type="number" name="quantity" value="{{ $orderPizza->quantity }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required min="1">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
