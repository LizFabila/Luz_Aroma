<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Luz & Aroma</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color:rgb(245, 253, 255);
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
            margin-left: 250px;
            padding: 20px;
        }
        .metric-card {
            background-color:rgb(185, 223, 245);
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
</head>
<body>
<!-- Barra lateral -->
<div class="sidebar">
    <h2>Luz & Aroma</h2>
    <ul>
        <li><a href="#">Login</a></li>
        <li><a href="{{ route ('ventas.index') }}">Ventas</a></li>
        <li><a href="{{ route ('productos.index') }}">Productos</a></li>
        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
        <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
        <li><a href="{{ route('costos.index') }}">Costos</a></li>
        <li><a href="{{ route('envios.index') }}">Envios</a></li>
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
    <!-- Sección de métricas -->
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
                <h3>Pedidos Recientes</h3>
                <table class="table table-striped table-custom">
                    <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Número de Pedido</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Iván Mora Guadarrama</td>
                        <td>71220263</td>
                        <td>03-05-2005</td>
                        <td>Entregado</td>
                    </tr>
                    <tr>
                        <td>Lizbeth Fabila Guadarrama</td>
                        <td>43791224</td>
                        <td>03-01-2005</td>
                        <td>En Proceso</td>
                    </tr>
                    <tr>
                        <td>Andrea Johana Garduño Santana</td>
                        <td>55742284</td>
                        <td>20-04-2005</td>
                        <td>Cancelado</td>
                    </tr>
                    <tr>
                        <td>Jesus Aurelio Casillas Vastardes</td>
                        <td>76859321</td>
                        <td>13-01-2005</td>
                        <td>Entregado</td>
                    </tr>
                    <tr>
                        <td>Moises de Jesus Eslava Mora</td>
                        <td>24732526</td>
                        <td>03-01-2005</td>
                        <td>En Proceso</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sección de productos destacados -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="metric-card">
                <h3>Productos Destacados</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/vela1.jpg" class="card-img-top" alt="Vela 1">
                            <div class="card-body">
                                <h5 class="card-title">Vela Lavanda</h5>
                                <p class="card-text">$10.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/vela2.jpg" class="card-img-top" alt="Vela 2">
                            <div class="card-body">
                                <h5 class="card-title">Vela Rosa</h5>
                                <p class="card-text">$15.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/vela3.jpg" class="card-img-top" alt="Vela 3">
                            <div class="card-body">
                                <h5 class="card-title">Vela Menta</h5>
                                <p class="card-text">$12.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/vela4.jpg" class="card-img-top" alt="Vela 4">
                            <div class="card-body">
                                <h5 class="card-title">Vela Vainilla</h5>
                                <p class="card-text">$18.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
