{{-- resources/views/edit_category.blade.php --}}
@extends('layouts.app')

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
        </form>
    </div>
@endsection
