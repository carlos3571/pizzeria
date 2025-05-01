@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Empleado</h2>

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Usuario</label>
                    <select name="user_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Cargo</label>
                    <select name="position" class="bg-blue-500 ..." required>
                        <option value="cajero">Cajero</option>
                        <option value="administrador">Administrador</option>
                        <option value="cocinero">Cocinero</option>
                        <option value="mensajero">Mensajero</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Número de Identificación</label>
                    <input type="text" name="identification_number" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Salario</label>
                    <input type="number" name="salary" step="0.01" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Fecha de Contratación</label>
                    <input type="date" name="hire_date" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('employees.index') }}" class="bg-blue-500 ...">
                        Cancelar
                    </a>
                    <button type="submit"class="bg-blue-500 ...">
                        Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
