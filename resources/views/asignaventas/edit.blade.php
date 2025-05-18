@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Editar Relación Venta-Producto</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('asigna-ventas.update', $asignaVenta->id_asigna_venta) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_venta" class="form-label">Venta</label>
                        <select name="id_venta" class="form-select" required>
                            @foreach($ventas as $venta)
                                <option value="{{ $venta->id_venta }}" {{ $venta->id_venta == $asignaVenta->id_venta ? 'selected' : '' }}>
                                    Venta #{{ $venta->id_venta }} - {{ $venta->fecha_venta->format('d/m/Y') }} (${{ number_format($venta->monto_total, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_producto" class="form-label">Producto</label>
                        <select name="id_producto" class="form-select" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id_producto }}"
                                        data-precio="{{ $producto->precio }}"
                                    {{ $producto->id_producto == $asignaVenta->id_producto ? 'selected' : '' }}>
                                    {{ $producto->nombre_producto }} (${{ number_format($producto->precio, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" min="1" value="{{ $asignaVenta->cantidad }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="precio_unitario" class="form-label">Precio Unitario</label>
                        <input type="number" name="precio_unitario" class="form-control" step="0.01" min="0" value="{{ $asignaVenta->precio_unitario }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('asigna-ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-completar precio unitario al seleccionar producto
        document.querySelector('select[name="id_producto"]').addEventListener('change', function() {
            const precio = this.options[this.selectedIndex].getAttribute('data-precio');
            document.querySelector('input[name="precio_unitario"]').value = precio;
        });
    </script>
@endsection
