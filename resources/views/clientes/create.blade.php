@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Crear Cliente</h2>

            <form action="{{ route('clients.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Usuario</label>
                    <select name="user_id" class="bg-blue-500" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Dirección</label>
                    <input type="text" name="address" class="bg-blue-500 ...">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="phone" class="bg-blue-500 ...">
                </div>

                <button type="submit" class="bg-blue-500 ...">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
