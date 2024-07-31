@extends('layouts.app')


@section('header')
    <x-shared.header-page title="Edita la categoria" path="categories.index" button="Volver"
        description="Edita la categoria {{ $category->name }}" />
@endsection


@section('contenido')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="max-w-md mx-auto space-y-4" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        
        <div class="form-control">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $category->name }}">
        </div>

        
        <div class="form-control">
            <label for="image">Nombre: </label>
            <input value="{{ $category->image }}" type="file" name="image">
        </div>

        <button class="btn-primary w-full">Guardar</button>

    </form>
@endsection