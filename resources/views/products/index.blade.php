@extends('layouts.app')
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
    
    <!-- Verificar si hay productos -->
    @if($products->isEmpty())
        <div class="alert alert-warning">No hay productos disponibles.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th> <!-- Nueva columna para Descripción -->
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td> <!-- Mostrar la descripción -->
                    <td>{{ number_format($product->price, 2) }}</td> <!-- Formatear el precio -->
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
