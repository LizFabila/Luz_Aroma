@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Editar <span style="color: #e84393;">Relación Venta-Producto</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('asigna-ventas.update', $asignaVenta->id_asigna_venta) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_venta" class="form-label">Venta</label>
                                <select name="id_venta" class="form-select @error('id_venta') is-invalid @enderror" required>
                                    @foreach($ventas as $venta)
                                        <option value="{{ $venta->id_venta }}" {{ $venta->id_venta == $asignaVenta->id_venta ? 'selected' : '' }}>
                                            Venta #{{ $venta->id_venta }} - {{ $venta->fecha_venta->format('d/m/Y') }} (${{ number_format($venta->monto_total, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_venta')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_producto" class="form-label">Producto</label>
                                <select name="id_producto" class="form-select @error('id_producto') is-invalid @enderror" required>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id_producto }}"
                                                data-precio="{{ $producto->precio }}"
                                            {{ $producto->id_producto == $asignaVenta->id_producto ? 'selected' : '' }}>
                                            {{ $producto->nombre_producto }} (${{ number_format($producto->precio, 2) }})
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
                                       min="1" value="{{ old('cantidad', $asignaVenta->cantidad) }}" required>
                                @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                <input type="number" name="precio_unitario" class="form-control @error('precio_unitario') is-invalid @enderror"
                                       step="0.01" min="0" value="{{ old('precio_unitario', $asignaVenta->precio_unitario) }}" required>
                                @error('precio_unitario')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('asigna-ventas.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
