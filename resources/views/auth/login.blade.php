@extends('layouts.auth')

@section('header')
    <h1>Inicia Sesion</h1>
    <p>Comienza a gestionar tu inventario</p>
@endsection


@section('content')
    
    <form novalidate action="{{ route('login.store') }}" method="POST" class="auth__login--form">
        @csrf


        @if (session('message'))
            <p class="alert">{{ session('message') }}</p>
        @endif

        <div class="form-control">
            <label>Correo electronico: </label>
            <input 
                type="email" 
                name="email"
                placeholder="correo@example.com"
                class="@error('email') input-error  @enderror"
            >
            @error('email')
                <p class="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-control">
            <label>Contraseña: </label>
            <input 
                type="password"  
                name="password"
                placeholder="Ingresa tu contraseña"
                class="@error('password') input-error  @enderror"
                
            >
            @error('password')
                <p class="alert">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn-primary w-full">Iniciar Sesion</button>

    </form>

@endsection