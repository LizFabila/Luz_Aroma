@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Listado de <span style="color: #e84393;">Pedidos</span>
                        </h3>
                        <a href="{{ route('pedidos.create') }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                              border: 2px solid #e84393;
                              color: #000000;
                              background-color: rgba(255,255,255,0.9);">
                            Nuevo Pedido
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
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id_pedido }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}</td>
                                    <td>{{ $pedido->cliente->nombre ?? 'N/A' }}</td>
                                    <td>${{ number_format($pedido->total, 2) }}</td>
                                    <td>{{ $pedido->estado_pedido }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este pedido?')">Eliminar</button>
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
