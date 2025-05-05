<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente')->orderBy('id_pedido', 'asc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return view('pedidos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado_pedido' => 'required|string|max:50',
            'cliente_id' => 'required|exists:clientes,cliente_id'
        ]);

        Pedido::create($validated);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido registrado correctamente');
    }

    // Método show eliminado

    public function edit($id_pedido)
    {
        $pedido = Pedido::findOrFail($id_pedido);
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return view('pedidos.edit', compact('pedido', 'clientes'));
    }

    public function update(Request $request, $id_pedido)
    {
        $pedido = Pedido::findOrFail($id_pedido);

        $validated = $request->validate([
            'fecha_pedido' => 'required|date',
            'total' => 'required|numeric|min:0',
            'estado_pedido' => 'required|string|max:50',
            'cliente_id' => 'required|exists:clientes,cliente_id'
        ]);

        $pedido->update($validated);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy($id_pedido)
    {
        $pedido = Pedido::findOrFail($id_pedido);
        $pedido->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido eliminado correctamente');
    }
}
