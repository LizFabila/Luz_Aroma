@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background: rgba(255,51,153,.05);">
                <h3 class="text-center" style="color: #333; font-size: 2.5rem; margin: 1rem 0;">
                    Asignación de <span style="color: #e84393;">Pedidos</span>
                </h3>
                <a href="{{ route('asigna-pedidos.create') }}"
                   class="btn btn-light btn-sm float-end"
                   style="margin-top: -4rem;
                      border: 2px solid #e84393;
                      color: #000000;
                      background-color: rgba(255,255,255,0.9);">
                    Nueva Asignación
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
                        <th>Pedido</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($asignaPedidos as $ap)
                        <tr>
                            <td>{{ $ap->id_asignapedido }}</td>
                            <td>Pedido #{{ $ap->pedido->id_pedido }} ({{ $ap->pedido->fecha_pedido->format('d/m/Y') }})</td>
                            <td>{{ $ap->producto->nombre_producto }}</td>
                            <td>{{ $ap->cantidad }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('asigna-pedidos.edit', $ap->id_asignapedido) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('asigna-pedidos.destroy', $ap->id_asignapedido) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta asignación?')">Eliminar</button>
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
