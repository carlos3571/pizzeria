@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Detalles del Ingrediente</h2>

            <div class="space-y-4 text-gray-700">
                <p><strong>Nombre:</strong> {{ $ingredient->name }}</p>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('ingredients.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Volver
                </a>

                <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="inline-flex items-center px-6 py-3 bg-yellow-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    Editar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
