@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Detalle de <span style="color: #e84393;">Venta #{{ $venta->id_venta }}</span>
                        </h3>
                        <a href="{{ route('asignaventas.create', ['venta' => $venta->id_venta]) }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                          border: 2px solid #e84393;
                          color: #000000;
                          background-color: rgba(255,255,255,0.9);">
                            Agregar Producto
                        </a>
                        <a href="{{ route('ventas.index') }}"
                           class="btn btn-light btn-sm float-end me-2"
                           style="margin-top: -6rem;
                          border: 2px solid #e84393;
                          color: #000000;
                          background-color: rgba(255,255,255,0.9);">
                            Volver a Ventas
                        </a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Fecha:</strong> {{ $venta->fecha_venta->format('d/m/Y') }}</p>
                                <p><strong>Cliente:</strong> {{ $venta->cliente->nombre ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <h4><strong>Total:</strong> ${{ number_format($venta->monto_total, 2) }}</h4>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($venta->asignaVentas as $item)
                                <tr>
                                    <td>{{ $item->producto->nombre ?? 'N/A' }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>${{ number_format($item->precio, 2) }}</td>
                                    <td>${{ number_format($item->subtotal, 2) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('asignaventas.edit', ['venta' => $venta->id_venta, 'asignaventa' => $item->id_asigna_ventas]) }}"
                                               class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('asignaventas.destroy', ['venta' => $venta->id_venta, 'asignaventa' => $item->id_asigna_ventas]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto de la venta?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
