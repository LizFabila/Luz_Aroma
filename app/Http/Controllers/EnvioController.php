<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Pedido;
use App\Models\CostoEnvio;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function index()
    {
        $envios = Envio::with(['pedido', 'costo'])
            ->orderBy('id_envio', 'asc')
            ->get();
        return view('envios.index', compact('envios'));
    }

    public function create()
    {
        $pedidos = Pedido::orderBy('id_pedido', 'asc')->get();
        $costos = Costo::orderBy('id_costo_envio', 'asc')->get();
        return view('envios.create', compact('pedidos', 'costos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_seguimiento' => 'nullable|string|max:100',
            'fecha_envio' => 'nullable|date',
            'direccion_destino' => 'nullable|string|max:255',
            'estado_paquete' => 'nullable|string|max:100',
            'id_pedido' => 'nullable|exists:pedidos,id_pedido',
            'id_costo_envio' => 'nullable|exists:costos_envios,id_costo_envio'
        ]);

        Envio::create($validated);

        return redirect()->route('envios.index')
            ->with('success', 'Envío registrado correctamente');
    }

    public function edit($id_envio)
    {
        $envio = Envio::findOrFail($id_envio);
        $pedidos = Pedido::orderBy('id_pedido', 'asc')->get();
        $costos = Costo::orderBy('id_costo_envio', 'asc')->get();
        return view('envios.edit', compact('envio', 'pedidos', 'costosEnvios'));
    }

    public function update(Request $request, $id_envio)
    {
        $envio = Envio::findOrFail($id_envio);

        $validated = $request->validate([
            'numero_seguimiento' => 'nullable|string|max:100',
            'fecha_envio' => 'nullable|date',
            'direccion_destino' => 'nullable|string|max:255',
            'estado_paquete' => 'nullable|string|max:100',
            'id_pedido' => 'nullable|exists:pedidos,id_pedido',
            'id_costo_envio' => 'nullable|exists:costos_envios,id_costo_envio'
        ]);

        $envio->update($validated);

        return redirect()->route('envios.index')
            ->with('success', 'Envío actualizado correctamente');
    }

    public function destroy($id_envio)
    {
        $envio = Envio::findOrFail($id_envio);
        $envio->delete();

        return redirect()->route('envios.index')
            ->with('success', 'Envío eliminado correctamente');
    }
}
