@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Cliente</h2>

            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Usuario</label>
                    <select name="user_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $client->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Dirección</label>
                    <input type="text" name="address" value="{{ $client->address }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="phone" value="{{ $client->phone }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit" class="bg-blue-500">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
