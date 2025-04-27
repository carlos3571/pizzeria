@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Detalles del Empleado</h2>

            <div class="space-y-4 text-gray-700">
                <p><strong>Nombre del Usuario:</strong> {{ $employee->user->name ?? 'Sin usuario' }}</p>
                <p><strong>Correo Electrónico:</strong> {{ $employee->user->email ?? '-' }}</p>
                <p><strong>Cargo:</strong> {{ ucfirst($employee->position) }}</p>
                <p><strong>Número de Identificación:</strong> {{ $employee->identification_number }}</p>
                <p><strong>Salario:</strong> ${{ number_format($employee->salary, 2) }}</p>
                <p><strong>Fecha de Contratación:</strong> {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('employees.index') }}" type="button" class="inline-flex items-center px-6 py-3 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
