<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Luz & Aroma</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
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
            display: block;
            padding: 8px 0;
            transition: all 0.3s;
        }
        .sidebar ul li a:hover {
            color: #f8f9fa;
            padding-left: 5px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .metric-card {
            background-color: rgb(185, 223, 245);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .metric-card:hover {
            transform: translateY(-5px);
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
        .quick-action-btn {
            height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.3s;
        }
        .quick-action-btn:hover {
            transform: scale(1.05);
        }
        .activity-item {
            padding: 10px;
            border-left: 3px solid #0d6efd;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body>
<!-- Barra lateral -->
<div class="sidebar">
    <h2>Luz & Aroma</h2>
    <ul>

        <li><a href="{{ route ('ventas.index') }}">Ventas</a></li>
        <li><a href="{{ route ('productos.index') }}">Productos</a></li>
        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
        <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
        <li><a href="{{ route('costos.index') }}">Costos</a></li>
        <li><a href="{{ route('envios.index') }}">Envios</a></li>
        <li><a href="{{ route('asigna-ventas.index') }}">Relación Ventas-Clientes</a></li>
        <li><a href="{{ route('asigna-pedidos.index') }}">Asignación de Pedidos</a></li>

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
    <h1 class="mb-4">Dashboard Principal</h1>

    <!-- Métricas principales -->
    <div class="row">
        <div class="col-md-3">
            <div class="metric-card">
                <h3>152</h3>
                <p>Ventas Hoy</p>
                <small class="text-success"><i class="bi bi-arrow-up"></i> 12% vs ayer</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card">
                <h3>$12,450</h3>
                <p>Ingresos Hoy</p>
                <small class="text-success"><i class="bi bi-arrow-up"></i> 8% vs ayer</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card">
                <h3>24</h3>
                <p>Nuevos Clientes</p>
                <small class="text-success"><i class="bi bi-arrow-up"></i> 5% vs ayer</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card">
                <h3>15</h3>
                <p>Pedidos Pendientes</p>
                <small class="text-danger"><i class="bi bi-arrow-down"></i> 3% vs ayer</small>
            </div>
        </div>
    </div>

    <!-- Gráficos y accesos rápidos -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card table-custom mb-4">
                <div class="card-header">
                    <h5>Ventas Mensuales</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card table-custom">
                <div class="card-header">
                    <h5>Acciones Rápidas</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="{{ route('ventas.index') }}" class="btn btn-primary quick-action-btn">
                                <i class="bi bi-cart-plus fs-3"></i>
                                <span>Nueva Venta</span>
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('productos.index') }}" class="btn btn-success quick-action-btn">
                                <i class="bi bi-box-seam fs-3"></i>
                                <span>Agregar Producto</span>
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('clientes.index') }}" class="btn btn-info quick-action-btn">
                                <i class="bi bi-person-plus fs-3"></i>
                                <span>Nuevo Cliente</span>
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-warning quick-action-btn">
                                <i class="bi bi-truck fs-3"></i>
                                <span>Ver Pedidos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tablas de información -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card table-custom">
                <div class="card-header">
                    <h5>Ventas Recientes</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#1254</td>
                            <td>María González</td>
                            <td>$1,250</td>
                            <td><span class="badge bg-success">Completado</span></td>
                        </tr>
                        <tr>
                            <td>#1253</td>
                            <td>Juan Pérez</td>
                            <td>$890</td>
                            <td><span class="badge bg-warning text-dark">En proceso</span></td>
                        </tr>
                        <tr>
                            <td>#1252</td>
                            <td>Ana López</td>
                            <td>$1,520</td>
                            <td><span class="badge bg-success">Completado</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card table-custom">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Actividad Reciente</h5>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Ver todo</a>
                </div>
                <div class="card-body">
                    <div class="activity-item">
                        <strong>Nueva venta registrada</strong> - #1254 por $1,250
                        <div class="text-muted small">Hace 15 minutos</div>
                    </div>
                    <div class="activity-item">
                        <strong>Producto actualizado</strong> - Vela Aromática Lavanda
                        <div class="text-muted small">Hace 1 hora</div>
                    </div>
                    <div class="activity-item">
                        <strong>Pedido enviado</strong> - #1248 a Carlos Méndez
                        <div class="text-muted small">Hace 3 horas</div>
                    </div>
                    <div class="activity-item">
                        <strong>Nuevo cliente registrado</strong> - Laura Jiménez
                        <div class="text-muted small">Hoy a las 09:45</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de ventas
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Ventas 2024',
                data: [12000, 19000, 15000, 18000, 22000, 25000],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
