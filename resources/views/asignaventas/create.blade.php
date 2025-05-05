@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Agregar <span style="color: #e84393;">Producto a Venta #{{ $venta->id_venta }}</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('asignaventas.store', $venta->id_venta) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="id_producto" class="form-label">Producto *</label>
                                <select name="id_producto" class="form-select @error('id_producto') is-invalid @enderror" required>
                                    <option value="">Seleccione un producto</option>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id_producto }}" {{ old('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                                            {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad *</label>
                                <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"
                                       value="{{ old('cantidad', 1) }}" required min="1">
                                @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio Unitario *</label>
                                <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror"
                                       value="{{ old('precio') }}" required min="0">
                                @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('asignaventas.index', $venta->id_venta) }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Agregar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
