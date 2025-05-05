<?php

namespace App\Http\Controllers;

use App\Models\Costo;
use Illuminate\Http\Request;

class CostoController extends Controller
{
    public function index()
    {
        $costos = Costo::orderBy('id_costo_envio', 'asc')->get();
        return view('costos.index', compact('costos'));
    }

    public function create()
    {
        return view('costos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'zona' => 'nullable|string|max:100',
            'precio_base' => 'nullable|numeric|min:0',
            'precio_por_km' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string|max:255'
        ]);

        Costo::create($validated);

        return redirect()->route('costos.index')
            ->with('success', 'Costo registrado correctamente');
    }

    public function edit($id)
    {
        $costo = Costo::findOrFail($id);
        return view('costos.edit', compact('costo'));
    }

    public function update(Request $request, $id)
    {
        $costo = Costo::findOrFail($id);

        $validated = $request->validate([
            'zona' => 'nullable|string|max:100',
            'precio_base' => 'nullable|numeric|min:0',
            'precio_por_km' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string|max:255'
        ]);

        $costo->update($validated);

        return redirect()->route('costos.index')
            ->with('success', 'Costo actualizado correctamente');
    }

    public function destroy($id)
    {
        $costo = Costo::findOrFail($id);
        $costo->delete();

        return redirect()->route('costos.index')
            ->with('success', 'Costo eliminado correctamente');
    }
}
