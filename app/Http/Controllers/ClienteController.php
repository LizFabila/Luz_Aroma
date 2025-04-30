<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:15'
        ]);

        Cliente::create([
            'nombre' => $request->nombre,
            'direccion_envio' => $request->direccion_envio,
            'correo_electronico' => $request->correo_electronico,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:15'
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }
}
