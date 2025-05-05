@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Registrar <span style="color: #e84393;">Nuevo Envío</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('envios.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="numero_seguimiento" class="form-label">Número de Seguimiento</label>
                                <input type="text" name="numero_seguimiento" class="form-control @error('numero_seguimiento') is-invalid @enderror"
                                       value="{{ old('numero_seguimiento') }}">
                                @error('numero_seguimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fecha_envio" class="form-label">Fecha de Envío</label>
                                <input type="date" name="fecha_envio" class="form-control @error('fecha_envio') is-invalid @enderror"
                                       value="{{ old('fecha_envio') }}">
                                @error('fecha_envio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="direccion_destino" class="form-label">Dirección de Destino</label>
                                <input type="text" name="direccion_destino" class="form-control @error('direccion_destino') is-invalid @enderror"
                                       value="{{ old('direccion_destino') }}">
                                @error('direccion_destino')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="estado_paquete" class="form-label">Estado del Paquete</label>
                                <select name="estado_paquete" class="form-select @error('estado_paquete') is-invalid @enderror">
                                    <option value="">Seleccione un estado</option>
                                    <option value="En preparación" {{ old('estado_paquete') == 'En preparación' ? 'selected' : '' }}>En preparación</option>
                                    <option value="En tránsito" {{ old('estado_paquete') == 'En tránsito' ? 'selected' : '' }}>En tránsito</option>
                                    <option value="En reparto" {{ old('estado_paquete') == 'En reparto' ? 'selected' : '' }}>En reparto</option>
                                    <option value="Entregado" {{ old('estado_paquete') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                </select>
                                @error('estado_paquete')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_pedido" class="form-label">Pedido Relacionado</label>
                                <select name="id_pedido" class="form-select @error('id_pedido') is-invalid @enderror">
                                    <option value="">Seleccione un pedido</option>
                                    @foreach($pedidos as $pedido)
                                        <option value="{{ $pedido->id_pedido }}" {{ old('id_pedido') == $pedido->id_pedido ? 'selected' : '' }}>
                                            Pedido #{{ $pedido->id_pedido }} - {{ $pedido->cliente->nombre ?? 'Sin cliente' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pedido')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_costo_envio" class="form-label">Costo de Envío</label>
                                <select name="id_costo_envio" class="form-select @error('id_costo_envio') is-invalid @enderror">
                                    <option value="">Seleccione un costo</option>
                                    @foreach($costosEnvios as $costo)
                                        <option value="{{ $costo->id_costo_envio }}" {{ old('id_costo_envio') == $costo->id_costo_envio ? 'selected' : '' }}>
                                            {{ $costo->nombre }} - ${{ number_format($costo->costo, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_costo_envio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('envios.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Registrar Envío</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
