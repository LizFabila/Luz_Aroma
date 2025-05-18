<?php

namespace App\Http\Controllers;

use App\Models\AsignaPedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class AsignaPedidoController extends Controller
{
    public function index()
    {
        $asignaPedidos = AsignaPedido::with(['pedido', 'producto'])
            ->orderBy('id_asignapedido', 'desc')
            ->get();

        return view('asigna_pedidos.index', compact('asignaPedidos'));
    }

    public function create()
    {
        $pedidos = Pedido::orderBy('id_pedido', 'desc')->get();
        $productos = Producto::orderBy('nombre_producto', 'asc')->get();
        return view('asigna_pedidos.create', compact('pedidos', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1'
        ]);

        AsignaPedido::create($validated);

        return redirect()->route('asigna-pedidos.index')
            ->with('success', 'Relación pedido-producto creada correctamente');
    }

    public function edit($id)
    {
        $asignaPedido = AsignaPedido::findOrFail($id);
        $pedidos = Pedido::orderBy('id_pedido', 'desc')->get();
        $productos = Producto::orderBy('nombre_producto', 'asc')->get();

        return view('asigna_pedidos.edit', compact('asignaPedido', 'pedidos', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $asignaPedido = AsignaPedido::findOrFail($id);

        $validated = $request->validate([
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1'
        ]);

        $asignaPedido->update($validated);

        return redirect()->route('asigna-pedidos.index')
            ->with('success', 'Relación pedido-producto actualizada correctamente');
    }

    public function destroy($id)
    {
        $asignaPedido = AsignaPedido::findOrFail($id);
        $asignaPedido->delete();

        return redirect()->route('asigna-pedidos.index')
            ->with('success', 'Relación pedido-producto eliminada correctamente');
    }
}
