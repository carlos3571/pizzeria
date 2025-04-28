@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Compra</h2>

            <form action="{{ route('purchases.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Proveedor</label>
                    <select name="supplier_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Materia Prima</label>
                    <select name="raw_material_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($rawMaterials as $rawMaterial)
                            <option value="{{ $rawMaterial->id }}">{{ $rawMaterial->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Cantidad</label>
                    <input type="number" name="quantity" step="0.01" min="0" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Precio de Compra</label>
                    <input type="number" name="purchase_price" step="0.01" min="0" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Fecha de Compra</label>
                    <input type="date" name="purchase_date" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <button type="submit" class="x-primary-button">
                    Guardar Compra
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
