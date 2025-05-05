@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                            Registrar <span style="color: #e84393;">Nuevo Producto</span>
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('productos.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre_producto" class="form-label">Nombre del Producto *</label>
                                <input type="text" name="nombre_producto" class="form-control @error('nombre_producto') is-invalid @enderror"
                                       value="{{ old('nombre_producto') }}" required maxlength="100">
                                @error('nombre_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                          rows="3" maxlength="255">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fragancia" class="form-label">Fragancia</label>
                                <input type="text" name="fragancia" class="form-control @error('fragancia') is-invalid @enderror"
                                       value="{{ old('fragancia') }}" maxlength="100">
                                @error('fragancia')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio *</label>
                                <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror"
                                       value="{{ old('precio') }}" required min="0">
                                @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="stock_min" class="form-label">Stock Mínimo</label>
                                    <input type="number" name="stock_min" class="form-control @error('stock_min') is-invalid @enderror"
                                           value="{{ old('stock_min') }}" min="0">
                                    @error('stock_min')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="stock_max" class="form-label">Stock Máximo</label>
                                    <input type="number" name="stock_max" class="form-control @error('stock_max') is-invalid @enderror"
                                           value="{{ old('stock_max') }}" min="0">
                                    @error('stock_max')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="existencias" class="form-label">Existencias</label>
                                    <input type="number" name="existencias" class="form-control @error('existencias') is-invalid @enderror"
                                           value="{{ old('existencias') }}" min="0">
                                    @error('existencias')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('productos.index') }}" class="btn btn-light" style="border: 2px solid #e84393; color: #000000;">Cancelar</a>
                                <button type="submit" class="btn btn-light" style="border: 2px solid #e84393; background-color: rgba(246,170,208,0.39); color: #000000;">Registrar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
