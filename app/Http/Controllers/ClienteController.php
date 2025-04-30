<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->get(); // Ordenar por más reciente
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100|unique:clientes',
            'telefono' => 'nullable|string|max:15'
        ]);

        Cliente::create($validatedData);

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
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100|unique:clientes,correo_electronico,'.$cliente->id,
            'telefono' => 'nullable|string|max:15'
        ]);

        $cliente->update($validatedData);

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
