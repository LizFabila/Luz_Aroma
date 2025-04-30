@extends("layouts.app")

@section("content")
    <style>
        /* Tus estilos actuales... */
    </style>

    <!-- Barra lateral (mantener igual) -->
    <div class="sidebar">
        <!-- Contenido actual... -->
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <!-- Métricas (mantener igual) -->
        <div class="row">
            <!-- Contenido actual... -->
        </div>

        <!-- Tabla de clientes (modificada) -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="metric-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>CLIENTES</h3>
                        <a href="{{ route('clientes.create') }}" class="btn btn-success">Agregar Cliente</a>
                    </div>
                    <table class="table table-striped table-custom">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->correo_electronico }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->fecha_registro->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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

        <!-- Productos destacados (mantener igual) -->
        <div class="row mt-4">
            <!-- Contenido actual... -->
        </div>
    </div>
@endsection
