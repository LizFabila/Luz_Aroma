@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Listado de <span style="color: #e84393;">Envíos</span>
                        </h3>
                        <a href="{{ route('envios.create') }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                              border: 2px solid #e84393;
                              color: #000000;
                              background-color: rgba(255,255,255,0.9);">
                            Nuevo Envío
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
                                <th>N° Seguimiento</th>
                                <th>Fecha Envío</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>Costo Envío</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($envios as $envio)
                                <tr>
                                    <td>{{ $envio->id_envio }}</td>
                                    <td>{{ $envio->numero_seguimiento ?? 'N/A' }}</td>
                                    <td>{{ $envio->fecha_envio ? \Carbon\Carbon::parse($envio->fecha_envio)->format('d/m/Y') : 'N/A' }}</td>
                                    <td>
                                        @if($envio->pedido && $envio->pedido->cliente)
                                            {{ $envio->pedido->cliente->nombre }} {{ $envio->pedido->cliente->apellido }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $envio->estado_paquete ?? 'N/A' }}</td>
                                    <td>
                                        @if($envio->costo)
                                            ${{ number_format($envio->costo->precio_base, 2) }} ({{ $envio->costo->zona ?? 'N/A' }})
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('envios.edit', $envio->id_envio) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('envios.destroy', $envio->id_envio) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este envío?')">Eliminar</button>
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
