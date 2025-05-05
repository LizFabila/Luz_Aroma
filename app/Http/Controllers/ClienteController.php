<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('cliente_id', 'asc')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100|unique:clientes',
            'telefono' => 'nullable|string|max:15'
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente');
    }

    public function show($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100|unique:clientes,correo_electronico,'.$cliente_id.',cliente_id',
            'telefono' => 'nullable|string|max:15'
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }
}
