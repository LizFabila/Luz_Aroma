<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('envio.index'); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return"Hola desde Create"; //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return"Hola desde Store";//
    }

    /**
     * Display the specified resource.
     */
    public function show(Envio $envio)
    {
        return"Hola desde Show";//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Envio $envio)
    {
        return"Hola desde Edit";//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Envio $envio)
    {
        return"Hola desde Update";//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Envio $envio)
    {
        return"Hola desde Destroy";//
    }
}
