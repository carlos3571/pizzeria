@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Rol:</strong> {{ $user->role }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
