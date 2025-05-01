@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Proveedor</h2>

            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label for="contact_info" class="block text-gray-700 mb-2">Información de Contacto</label>
                    <input type="text" name="contact_info" id="contact_info" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit" class="bg-blue-500 ...">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
