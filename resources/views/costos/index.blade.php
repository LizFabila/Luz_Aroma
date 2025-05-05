@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: rgba(255,51,153,.05);">
                        <h3 class="text-center" style="color: #333; font-size: 4rem; margin: 2rem 0;">
                            Listado de <span style="color: #e84393;">Costos</span>
                        </h3>
                        <a href="{{ route('costos.create') }}"
                           class="btn btn-light btn-sm float-end"
                           style="margin-top: -6rem;
                              border: 2px solid #e84393;
                              color: #000000;
                              background-color: rgba(255,255,255,0.9);">
                            Nuevo Costo
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
                                <th>Zona</th>
                                <th>Precio Base</th>
                                <th>Precio por Km</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($costos as $costo)
                                <tr>
                                    <td>{{ $costo->id_costo_envio }}</td>
                                    <td>{{ $costo->zona ?? 'N/A' }}</td>
                                    <td>${{ number_format($costo->precio_base, 2) }}</td>
                                    <td>${{ number_format($costo->precio_por_km, 2) }}</td>
                                    <td>{{ $costo->descripcion ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('costos.edit', $costo->id_costo_envio) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('costos.destroy', $costo->id_costo_envio) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este costo?')">Eliminar</button>
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
