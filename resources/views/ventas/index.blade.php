@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Listado de <span style="color: #e84393;">Ventas</span>
                        </h3>
                        <a href="{{ route('ventas.create') }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                              border: 2px solid #e84393;
                              color: #000000;
                              background-color: rgba(255,255,255,0.9);">
                            Nueva Venta
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
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Monto Total</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->id_venta }}</td>
                                    <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</td>
                                    <td>{{ $venta->cliente->nombre ?? 'N/A' }}</td>
                                    <td>${{ number_format($venta->monto_total, 2) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('ventas.edit', $venta->id_venta) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta venta?')">Eliminar</button>
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
