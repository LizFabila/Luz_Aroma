@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Registrar Nuevo Cliente</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('clientes.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Completo *</label>
                                <input type="text"
                                       name="nombre"
                                       id="nombre"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       value="{{ old('nombre') }}"
                                       required
                                       maxlength="255">
                                @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="direccion_envio" class="form-label">Dirección de Envío *</label>
                                <textarea name="direccion_envio"
                                          id="direccion_envio"
                                          class="form-control @error('direccion_envio') is-invalid @enderror"
                                          rows="3"
                                          required
                                          maxlength="255">{{ old('direccion_envio') }}</textarea>
                                @error('direccion_envio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">Correo Electrónico *</label>
                                <input type="email"
                                       name="correo_electronico"
                                       id="correo_electronico"
                                       class="form-control @error('correo_electronico') is-invalid @enderror"
                                       value="{{ old('correo_electronico') }}"
                                       required
                                       maxlength="100">
                                @error('correo_electronico')
                                <div class="invalid-f
