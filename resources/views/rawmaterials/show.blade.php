@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Detalles de la Materia Prima</h2>

            <div class="space-y-4 text-gray-700">
                <p><strong>Nombre:</strong> {{ $rawMaterial->name ?? '-' }}</p>
                <p><strong>Unidad:</strong> {{ $rawMaterial->unit ?? '-' }}</p>
                <p><strong>Stock Actual:</strong> {{ $rawMaterial->current_stock ?? '0' }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('raw-materials.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
