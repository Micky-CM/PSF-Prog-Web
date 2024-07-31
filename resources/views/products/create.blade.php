@extends('layouts.app')

@section('header')
    <x-shared.header-page title="Nuevo producto" path="products.index" button="Volver"
        description="Agrega un producto a tu inventario" />
@endsection

@section('contenido')
    <div class="md:grid md:grid-cols-2 gap-6">

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="max-w-lg w-full mx-auto space-y-4">
            @csrf
            <div class="form-control">
                <label for="name">Nombre: </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-control">
                <label for="description">Descripción: </label>
                <input type="text" id="description" name="description" value="{{ old('description') }}" required>
                @if ($errors->has('description'))
                    <div class="text-red-500">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="form-control">
                <label for="stock">Stock disponible: </label>
                <input type="number" min="0" id="stock" name="stock" value="{{ old('stock') }}" required>
                @if ($errors->has('stock'))
                    <div class="text-red-500">{{ $errors->first('stock') }}</div>
                @endif
            </div>

            <div class="form-control">
                <label for="price">Precio: </label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" required>
                @if ($errors->has('price'))
                    <div class="text-red-500">{{ $errors->first('price') }}</div>
                @endif
            </div>

            <div class="form-control">
                <label for="image">Seleccione una imagen: </label>
                <input type="file" name="image" id="inputImage">
                @if ($errors->has('image'))
                    <div class="text-red-500">{{ $errors->first('image') }}</div>
                @endif
            </div>

            <div>
                <label for="category_id">Seleccione una categoría: </label>
                <select class="bg-secondary w-full py-3 px-2 rounded-md" required name="category_id" id="category">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option>No hay categorías disponibles</option>
                    @endforelse
                </select>
            </div>

            <button class="btn-primary w-full" type="submit">Guardar</button>

        </form>
        
        <div class="w-full">
            <h3 class="text-center text-xl font-bold">Imagen del producto</h3>
            <p class="text-center" id="imagePreviewText">No hay imagen seleccionada</p>
            <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display:none;" class="mx-auto mt-4">
        </div>
    </div>

    <script>
        document.getElementById('inputImage').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('imagePreviewText').innerText = file.name;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
