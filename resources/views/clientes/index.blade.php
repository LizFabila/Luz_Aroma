@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Listado de <span style="color: #e84393;">Clientes</span>
                        </h3>
                        <a href="{{ route('clientes.create') }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                              border: 2px solid #e84393;
                              color: #000000;
                              background-color: rgba(255,255,255,0.9);">
                            Nuevo Cliente
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
                                <th>Nombre</th>
                                <th>Dirección Envío</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->cliente_id }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->direccion_envio }}</td>
                                    <td>{{ $cliente->correo_electronico }}</td>
                                    <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('clientes.edit', $cliente->cliente_id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente->cliente_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</button>
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
