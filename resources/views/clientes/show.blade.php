@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Detalles del Cliente</h2>

            <div class="space-y-4 text-gray-700">
                <p><strong>Nombre del Usuario:</strong> {{ $client->user->name ?? 'Sin usuario' }}</p>
                <p><strong>Dirección:</strong> {{ $client->address ?? '-' }}</p>
                <p><strong>Teléfono:</strong> {{ $client->phone ?? '-' }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

