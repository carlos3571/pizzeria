@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Materia Prima</h2>

            <form action="{{ route('raw-materials.update', $rawMaterial->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $rawMaterial->name) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Unidad</label>
                    <input type="text" name="unit" value="{{ old('unit', $rawMaterial->unit) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Stock Actual</label>
                    <input type="number" name="current_stock" value="{{ old('current_stock', $rawMaterial->current_stock) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required min="0">
                </div>

                <button type="submit" class="">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
