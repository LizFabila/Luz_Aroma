@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Pedido</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="fecha_pedido" class="form-label">Fecha de Pedido *</label>
                                <input type="date" name="fecha_pedido" class="form-control @error('fecha_pedido') is-invalid @enderror"
                                       value="{{ old('fecha_pedido', $pedido->fecha_pedido->format('Y-m-d')) }}" required>
                                @error('fecha_pedido')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cliente_id" class="form-label">Cliente *</label>
                                <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                                    <option value="">Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->cliente_id }}" {{ old('cliente_id', $pedido->cliente_id) == $cliente->cliente_id ? 'selected' : '' }}>
                                            {{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="total" class="form-label">Total *</label>
                                <input type="number" step="0.01" name="total" class="form-control @error('total') is-invalid @enderror"
                                       value="{{ old('total', $pedido->total) }}" required min="0">
                                @error('total')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="estado_pedido" class="form-label">Estado del Pedido *</label>
                                <select name="estado_pedido" class="form-select @error('estado_pedido') is-invalid @enderror" required>
                                    <option value="Pendiente" {{ old('estado_pedido', $pedido->estado_pedido) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="En proceso" {{ old('estado_pedido', $pedido->estado_pedido) == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                    <option value="Completado" {{ old('estado_pedido', $pedido->estado_pedido) == 'Completado' ? 'selected' : '' }}>Completado</option>
                                    <option value="Cancelado" {{ old('estado_pedido', $pedido->estado_pedido) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                                @error('estado_pedido')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pedidos.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
