<?php

namespace App\Http\Controllers;

use App\Models\AsignaVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class AsignaVentaController extends Controller
{
    public function index()
    {
        $asignaVentas = AsignaVenta::with(['venta', 'producto'])
            ->orderBy('id_asigna_venta', 'desc')
            ->get();

        return view('asigna_ventas.index', compact('asignaVentas'));
    }

    public function create()
    {
        $ventas = Venta::orderBy('id_venta', 'desc')->get();
        $productos = Producto::orderBy('nombre_producto', 'asc')->get();
        return view('asigna_ventas.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);

        AsignaVenta::create($validated);

        return redirect()->route('asigna-ventas.index')
            ->with('success', 'Relación venta-producto creada correctamente');
    }

    public function edit($id)
    {
        $asignaVenta = AsignaVenta::findOrFail($id);
        $ventas = Venta::orderBy('id_venta', 'desc')->get();
        $productos = Producto::orderBy('nombre_producto', 'asc')->get();

        return view('asigna_ventas.edit', compact('asignaVenta', 'ventas', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $asignaVenta = AsignaVenta::findOrFail($id);

        $validated = $request->validate([
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ]);

        $asignaVenta->update($validated);

        return redirect()->route('asigna-ventas.index')
            ->with('success', 'Relación venta-producto actualizada correctamente');
    }

    public function destroy($id)
    {
        $asignaVenta = AsignaVenta::findOrFail($id);
        $asignaVenta->delete();

        return redirect()->route('asigna-ventas.index')
            ->with('success', 'Relación venta-producto eliminada correctamente');
    }
}
