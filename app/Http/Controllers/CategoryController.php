<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Mostrar formulario para crear una nueva categoría
    public function create()
    {
        return view('categories.create');
    }

    // Mostrar el formulario de edición para una categoría existente
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Almacenar una nueva categoría en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
    }

    // Actualizar los datos de una categoría existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Buscar la categoría por su ID
        $category = Category::findOrFail($id);

        // Actualizar los datos de la categoría
        $category->update($request->all());

        // Redirigir al listado de categorías con mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        // Buscar la categoría por su ID
        $category = Category::findOrFail($id);

        // Eliminar la categoría
        $category->delete();

        // Redirigir al listado de categorías con mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
