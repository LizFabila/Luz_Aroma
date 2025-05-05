@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Cliente</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('clientes.update', $cliente->cliente_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Completo *</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                       value="{{ old('nombre', $cliente->nombre) }}" required maxlength="255">
                                @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="direccion_envio" class="form-label">Dirección de Envío *</label>
                                <textarea name="direccion_envio" class="form-control @error('direccion_envio') is-invalid @enderror"
                                          rows="3" required maxlength="255">{{ old('direccion_envio', $cliente->direccion_envio) }}</textarea>
                                @error('direccion_envio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">Correo Electrónico *</label>
                                <input type="email" name="correo_electronico" class="form-control @error('correo_electronico') is-invalid @enderror"
                                       value="{{ old('correo_electronico', $cliente->correo_electronico) }}" required maxlength="100">
                                @error('correo_electronico')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                       value="{{ old('telefono', $cliente->telefono) }}" maxlength="15">
                                @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('clientes.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
