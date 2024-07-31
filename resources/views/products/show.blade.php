@extends('layouts.app')

@section('header')
    <x-shared.header-page :title="$product->name" path="products.index" button="Volver" :description="'Detalles de '.$product->name" />
@endsection


@section('contenido')
    <div class="md:grid md:grid-cols-2">
        <div class="max-w-lg w-full mx-auto space-y-4">
            <div class="form-control">
                <label for="name">Nombre: </label>
                <input disabled type="text" id="name" value="{{ $product->name }}" name="name">
            </div>

            <div class="form-control">
                <label for="description">Descripcion: </label>
                <textarea disabled type="text" id="description" name="description">{{ $product->description }}</textarea>
            </div>

            <div class="form-control">
                <label for="stock">Stock disponible: </label>
                <input disabled type="number" min="0" id="stock" value="{{ $product->stock }}" name="stock">
            </div>

            <div class="form-control">
                <label for="price">Precio: </label>
                <input disabled type="number" id="price" value="{{ $product->price }}" name="price">
            </div>

            <div class="form-control">
                <label for="category_id">Categoria: </label>
                <input disabled type="text"  value="{{ $product->category->name }}" name="category">
            </div>

        </div>
        <div>
            <h3 class="text-center text-xl font-bold">Imagen del producto</h3>
            <img src="{{ '/'.$product->image }} " alt="{{ $product->name }}" class="max-w-md mx-auto">
        </div>
    </div>
@endsection
