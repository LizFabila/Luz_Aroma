@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background: rgba(255,51,153,.05);">
                <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                    Relación <span style="color: #e84393;">Ventas-Clientes</span>
                </h3>
                <a href="{{ route('asigna-ventas.create') }}"
                   class="btn btn-light btn-sm float-end"
                   style="margin-top: -4rem;
                      border: 2px solid #e84393;
                      color: #000000;
                      background-color: rgba(255,255,255,0.9);">
                    Nueva Relación
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Venta</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($asignaVentas as $av)
                        <tr>
                            <td>{{ $av->id_asigna_venta }}</td>
                            <td>Venta #{{ $av->venta->id_venta }} ({{ $av->venta->fecha_venta->format('d/m/Y') }})</td>
                            <td>{{ $av->producto->nombre_producto }}</td>
                            <td>{{ $av->cantidad }}</td>
                            <td>${{ number_format($av->precio_unitario, 2) }}</td>
                            <td>${{ number_format($av->subtotal, 2) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('asigna-ventas.edit', $av->id_asigna_venta) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('asigna-ventas.destroy', $av->id_asigna_venta) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta relación?')">Eliminar</button>
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
@endsection
