@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Sucursal</h2>

            <form action="{{ route('branches.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nombre de la Sucursal</label>
                    <input type="text" name="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Dirección</label>
                    <input type="text" name="address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 ...">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
