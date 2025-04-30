@extends("layouts.app")

@section("content")
    <style>
        /* Los mismos estilos que create.blade.php */
    </style>

    <!-- Barra lateral -->
    <div class="sidebar">
        <!-- Mantener igual -->
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="form-container">
            <h2>Editar Cliente</h2>
            <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}" required>
                </div>
                <div class="mb-3">
                    <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ $cliente->correo_electronico }}" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="{{ $cliente->fecha_registro->format('Y-m-d') }}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
