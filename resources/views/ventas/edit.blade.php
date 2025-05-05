@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Venta</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('ventas.update', $venta->id_venta) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="fecha_venta" class="form-label">Fecha de Venta *</label>
                                <input type="date" name="fecha_venta" class="form-control @error('fecha_venta') is-invalid @enderror"
                                       value="{{ old('fecha_venta', $venta->fecha_venta->format('Y-m-d')) }}" required>
                                @error('fecha_venta')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cliente_id" class="form-label">Cliente *</label>
                                <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                                    <option value="">Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->cliente_id }}" {{ old('cliente_id', $venta->cliente_id) == $cliente->cliente_id ? 'selected' : '' }}>
                                            {{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="monto_total" class="form-label">Monto Total *</label>
                                <input type="number" step="0.01" name="monto_total" class="form-control @error('monto_total') is-invalid @enderror"
                                       value="{{ old('monto_total', $venta->monto_total) }}" required min="0">
                                @error('monto_total')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ventas.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
