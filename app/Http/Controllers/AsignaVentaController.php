<?php

namespace App\Http\Controllers;

use App\Models\AsignaVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class AsignaventaController extends Controller
{
    // Método para mostrar todas las asignaciones de ventas
    public function indexAll()
    {
        $asignaciones = AsignaVenta::with(['venta', 'producto'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('asignaventas.index', [
            'asignaciones' => $asignaciones,
            'showVentaColumn' => true
        ]);
    }

    // Método original para mostrar asignaciones de una venta específica
    public function index($id_venta)
    {
        $venta = Venta::with(['asignaVentas', 'asignaVentas.producto'])->findOrFail($id_venta);
        return view('asignaventas.index', compact('venta'));
    }

    public function create($id_venta)
    {
        $venta = Venta::findOrFail($id_venta);
        $productos = Producto::orderBy('nombre', 'asc')->get();
        return view('asignaventas.create', compact('venta', 'productos'));
    }

    public function store(Request $request, $id_venta)
    {
        $validated = $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0'
        ]);

        $validated['id_venta'] = $id_venta;
        $validated['subtotal'] = $validated['cantidad'] * $validated['precio'];

        AsignaVenta::create($validated);

        // Actualizar monto total de la venta
        $venta = Venta::findOrFail($id_venta);
        $venta->monto_total = $venta->asignaVentas()->sum('subtotal');
        $venta->save();

        return redirect()->route('asignaventas.index', $id_venta)
            ->with('success', 'Producto asignado a venta correctamente');
    }

    public function edit($id_venta, $id_asigna_venta)
    {
        $asignaVenta = AsignaVenta::findOrFail($id_asigna_venta);
        $productos = Producto::orderBy('nombre', 'asc')->get();
        return view('asignaventas.edit', compact('asignaVenta', 'productos'));
    }

    public function update(Request $request, $id_venta, $id_asigna_venta)
    {
        $asignaVenta = AsignaVenta::findOrFail($id_asigna_venta);

        $validated = $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0'
        ]);

        $validated['subtotal'] = $validated['cantidad'] * $validated['precio'];

        $asignaVenta->update($validated);

        // Actualizar monto total de la venta
        $venta = Venta::findOrFail($id_venta);
        $venta->monto_total = $venta->asignaVentas()->sum('subtotal');
        $venta->save();

        return redirect()->route('asignaventas.index', $id_venta)
            ->with('success', 'Producto de venta actualizado correctamente');
    }

    public function destroy($id_venta, $id_asigna_venta)
    {
        $asignaVenta = AsignaVenta::findOrFail($id_asigna_venta);
        $asignaVenta->delete();

        // Actualizar monto total de la venta
        $venta = Venta::findOrFail($id_venta);
        $venta->monto_total = $venta->asignaVentas()->sum('subtotal');
        $venta->save();

        return redirect()->route('asignaventas.index', $id_venta)
            ->with('success', 'Producto eliminado de la venta correctamente');
    }
}
