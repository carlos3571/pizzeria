@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Orden</h2>

            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Cliente</label>
                    <select name="client_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Sucursal</label>
                    <select name="branch_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Tipo de Entrega</label>
                    <select name="delivery_type" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected' : '' }}>En Local</option>
                        <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected' : '' }}>A Domicilio</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Estado</label>
                    <select name="status" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected' : '' }}>En Preparación</option>
                        <option value="listo" {{ $order->status == 'listo' ? 'selected' : '' }}>Listo</option>
                        <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Repartidor (opcional)</label>
                    <select name="delivery_person_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-- Sin asignar --</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $order->delivery_person_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Precio Total</label>
                    <input type="number" name="total_price" value="{{ $order->total_price }}" step="0.01" min="0"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                

                <button type="submit" class="">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
