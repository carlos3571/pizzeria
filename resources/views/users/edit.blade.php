@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role" class="form-control" required>
                <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="empleado" {{ $user->role == 'empleado' ? 'selected' : '' }}>Empleado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
