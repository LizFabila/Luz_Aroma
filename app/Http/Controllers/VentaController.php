<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->orderBy('id_venta', 'asc')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return view('ventas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_venta' => 'required|date',
            'monto_total' => 'required|numeric|min:0',
            'cliente_id' => 'required|exists:clientes,cliente_id'
        ]);

        Venta::create($validated);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta registrada correctamente');
    }

    public function show($id_venta)
    {
        $venta = Venta::with('cliente')->findOrFail($id_venta);
        return view('ventas.show', compact('venta'));
    }

    public function edit($id_venta)
    {
        $venta = Venta::findOrFail($id_venta);
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return view('ventas.edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, $id_venta)
    {
        $venta = Venta::findOrFail($id_venta);

        $validated = $request->validate([
            'fecha_venta' => 'required|date',
            'monto_total' => 'required|numeric|min:0',
            'cliente_id' => 'required|exists:clientes,cliente_id'
        ]);

        $venta->update($validated);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta actualizada correctamente');
    }

    public function destroy($id_venta)
    {
        $venta = Venta::findOrFail($id_venta);
        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada correctamente');
    }
}
