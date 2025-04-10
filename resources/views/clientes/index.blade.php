@extends("layouts.app")

@section("content")
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: rgb(245, 253, 255);
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            margin-left: 270px; /* Ajuste para no solaparse con el sidebar */
            padding: 20px;
        }
        .metric-card {
            background-color: rgb(194, 185, 245);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .metric-card h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .metric-card p {
            margin: 0;
            font-size: 16px;
            color: #666;
        }
        .table-custom {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(2, 2, 2, 0.1);
        }
    </style>

    <!-- Barra lateral -->
    <div class="sidebar">
        <h2>Luz & Aroma</h2>
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Ventas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
        <hr>
        <p>Cerrado</p>
        <input type="text" class="form-control" placeholder="Buscar">
        <hr>
        <h3>PANEL DE USUARIO</h3>
        <ul>
            <li><a href="#">Velas Vendidas</a></li>
            <li><a href="#">2025</a></li>
            <li><a href="#">2024</a></li>
            <li><a href="#">2023</a></li>
            <li><a href="#">2022</a></li>
            <li><a href="#">2021</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-4">
                <div class="metric-card">
                    <h3>87,3%</h3>
                    <p>Satisfacción del Cliente</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card">
                    <h3>1,021M</h3>
                    <p>Ventas Totales</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card">
                    <h3>64,5%</h3>
                    <p>Crecimiento Anual</p>
                </div>
            </div>
        </div>

        <!-- Tabla de pedidos -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="metric-card">
                    <h3>CLIENTES</h3>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->correo_electronico}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->fecha_registro}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sección de productos destacados -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="metric-card">
                    <h3>Productos Vendidos</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="images/vela5.jpg" class="card-img-top" alt="Vela 1">
                                <div class="card-body">
                                    <h5 class="card-title">Vela Miel</h5>
                                    <p class="card-text">$10.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="images/vela6.jpg" class="card-img-top" alt="Vela 2">
                                <div class="card-body">
                                    <h5 class="card-title">Vela Coffee</h5>
                                    <p class="card-text">$15.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="images/vela7.jpg" class="card-img-top" alt="Vela 3">
                                <div class="card-body">
                                    <h5 class="card-title">Vela Orilla del Mar</h5>
                                    <p class="card-text">$12.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="images/vela8.jpg" class="card-img-top" alt="Vela 4">
                                <div class="card-body">
                                    <h5 class="card-title">Vela Lila</h5>
                                    <p class="card-text">$18.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
