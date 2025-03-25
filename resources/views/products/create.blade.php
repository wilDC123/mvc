@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="price" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label>Categoría</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
