@extends('layouts.app')

@section('header')
    <x-shared.header-page title="Ventas" path="sales.index" button="Actualizar pagina"
        description="Gestiona las ventas de tu empresa" />
@endsection

@section('contenido')
    <div class="table">
        <div class="min-w-min">
            <div class="grid grid-cols-7">
                <h4>ID</h4>
                <h4>Cliente</h4>
                <h4>Usuario</h4>
                <h4>Productos</h4>
                <h4>Total</h4>
            </div>

            <div class="divider"></div>

            <div class="space-y-4">
                @forelse ($sales as $sale)
                    <div class="grid grid-cols-7 gap-4 items-center">

                        <p>{{ $sale->id }}</p>
                        <p>{{ $sale->client }}</p>
                        <p>{{ $sale->user_id }}</p>
                        <p>{{ count($sale->products) }}</p>
                        <p>{{ $sale->total }}</p>

                    </div>

                @empty
                    <p class="text-center">No hay ventas</p>
                @endforelse
            </div>


        </div>

    </div>
@endsection
