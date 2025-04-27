@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Empleado</h2>

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Usuario</label>
                    <select name="user_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Cargo</label>
                    <select name="position" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="cajero" {{ $employee->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                        <option value="administrador" {{ $employee->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="cocinero" {{ $employee->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                        <option value="mensajero" {{ $employee->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Número de Identificación</label>
                    <input type="text" name="identification_number" value="{{ $employee->identification_number }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Salario</label>
                    <input type="number" name="salary" value="{{ $employee->salary }}" step="0.01" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Fecha de Contratación</label>
                    <input type="date" name="hire_date" value="{{ $employee->hire_date }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('employees.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
