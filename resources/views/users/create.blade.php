@extends('layouts.app')

@section('header')
    <x-shared.header-page title="Nuevo Usuario" path="users.index" button="Volver"
        description="Agrega usuarios al sistema" />
@endsection


@section('contenido')
    <form class="max-w-md mx-auto space-y-4" method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-control">
            <label for="name">Nombre y apellidos: </label>
            <input type="text" name="name" placeholder="Escribe el nombre del usuario">
        </div>

        <div class="form-control">
            <label for="email">Correo electronico: </label>
            <input type="email" name="email" placeholder="Ingrese el correo del usuario">
        </div>

        <div class="form-control">
            <label for="password">Cree una contraseña: </label>
            <input type="password" name="password" placeholder="Escribe una contraseña">
        </div>

        <div>
            <label for="role_id">Seleccione el rol: </label>

            <select class="bg-secondary w-full py-3 px-2 rounded-md mb-4" name="role_id">
                @forelse ($roles as $role)
                    <option class="text-white" value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @empty
                    <option>No se encontro roles</option>
                @endforelse
            </select>

            <button class="btn-primary w-full">Guardar</button>

        </div>

    </form>
@endsection