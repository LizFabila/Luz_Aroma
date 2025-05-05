<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id_producto', 'asc')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'fragancia' => 'nullable|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock_min' => 'nullable|integer|min:0',
            'stock_max' => 'nullable|integer|min:0',
            'existencias' => 'nullable|integer|min:0'
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto registrado correctamente');
    }

    public function show($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        return view('productos.show', compact('producto'));
    }

    public function edit($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id_producto)
    {
        $producto = Producto::findOrFail($id_producto);

        $validated = $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'fragancia' => 'nullable|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock_min' => 'nullable|integer|min:0',
            'stock_max' => 'nullable|integer|min:0',
            'existencias' => 'nullable|integer|min:0'
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
