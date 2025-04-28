@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between mb-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Compras de Materias Primas
            </h2>
            <a href="{{ route('purchases.create') }}" class="x-primary-button">
                Crear Compra
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if (session('success'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materia Prima</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio de Compra</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Compra</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($purchases as $purchase)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->supplier->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->rawMaterial->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $purchase->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($purchase->purchase_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Editar</a>
                                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro de eliminar esta compra?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                        No hay compras registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
