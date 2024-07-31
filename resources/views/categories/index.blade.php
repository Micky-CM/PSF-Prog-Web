@extends('layouts.app')


@section('header')
    <x-shared.header-page title="Categorias" path="categories.create" button="Nueva categoria"
        description="Listado y gestion de categorias del sistema" />
@endsection

@section('contenido')
    <div class="table">
        {{-- HEADER DE LA TABLA --}}
        <div class="grid grid-cols-5 gap-8 mb-8">
            <h4>ID</h4>
            <h4>Imagen</h4>
            <h4>Nombre</h4>
            <h4 class="col-span-2">Acciones</h4>
        </div>

        <div class="divider"></div>

        {{-- BODY DE LA TABLA --}}
        <div class="space-y-4">
            @forelse ($categories as $category)
                <form method="POST" action="{{ route('categories.destroy', $category->id )}}" class="grid grid-cols-5 gap-8 items-center">
                    @method('DELETE')
                    @csrf
                    
                    <p>#{{ $category->id }}</p>
                    <img src="{{ $category->image }}" alt="{{ $category->name }}" width="64">
                    <p>{{ $category->name }}</p>

                    <div class="col-span-2 flex items-center gap-4">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn-primary-icon">
                            <i class="uil uil-pen"></i>
                        </a>

                        <button type="submit" class="btn-danger-icon">
                            <i class="uil uil-trash-alt"></i>
                        </button>

                    </div>
                </form>

            @empty
                <p>No hay categorias</p>

            @endforelse


        </div>

    </div>
@endsection
