@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Costo</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('costos.update', $costo->id_costo_envio) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="zona" class="form-label">Zona</label>
                                <input type="text" name="zona" class="form-control @error('zona') is-invalid @enderror"
                                       value="{{ old('zona', $costo->zona) }}" maxlength="100">
                                @error('zona')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio_base" class="form-label">Precio Base</label>
                                <input type="number" step="0.01" name="precio_base" class="form-control @error('precio_base') is-invalid @enderror"
                                       value="{{ old('precio_base', $costo->precio_base) }}" min="0">
                                @error('precio_base')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio_por_km" class="form-label">Precio por Km</label>
                                <input type="number" step="0.01" name="precio_por_km" class="form-control @error('precio_por_km') is-invalid @enderror"
                                       value="{{ old('precio_por_km', $costo->precio_por_km) }}" min="0">
                                @error('precio_por_km')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                          maxlength="255">{{ old('descripcion', $costo->descripcion) }}</textarea>
                                @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('costos.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
