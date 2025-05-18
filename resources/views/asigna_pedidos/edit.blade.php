@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Asignación de Pedido</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('asigna-pedidos.update', $asignaPedido->id_asignapedido) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_pedido" class="form-label">Pedido</label>
                                <select name="id_pedido" class="form-select @error('id_pedido') is-invalid @enderror" required>
                                    @foreach($pedidos as $pedido)
                                        <option value="{{ $pedido->id_pedido }}" {{ $pedido->id_pedido == $asignaPedido->id_pedido ? 'selected' : '' }}>
                                            Pedido #{{ $pedido->id_pedido }} - {{ $pedido->fecha_pedido->format('d/m/Y') }} ({{ $pedido->estado_pedido }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pedido')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_producto" class="form-label">Producto</label>
                                <select name="id_producto" class="form-select @error('id_producto') is-invalid @enderror" required>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id_producto }}" {{ $producto->id_producto == $asignaPedido->id_producto ? 'selected' : '' }}>
                                            {{ $producto->nombre_producto }} ({{ $producto->fragancia }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"
                                       min="1" value="{{ old('cantidad', $asignaPedido->cantidad) }}" required>
                                @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('asigna-pedidos.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
