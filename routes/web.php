<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AsignaVentaController;

// Rutas básicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/vela', function () {
    return view('vela');
})->name('vela');


Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
Route::resource('ventas', VentaController::class);
Route::resource('pedidos', PedidoController::class);
Route::resource('costos', CostoController::class);
Route::resource('envios', EnvioController::class);


Route::resource('asigna-ventas', \App\Http\Controllers\AsignaVentaController::class)
    ->names([
        'index' => 'asigna-ventas.index',
        'create' => 'asigna-ventas.create',
        'store' => 'asigna-ventas.store',
        'edit' => 'asigna-ventas.edit',
        'update' => 'asigna-ventas.update',
        'destroy' => 'asigna-ventas.destroy'
    ]);

Route::resource('asigna-pedidos', \App\Http\Controllers\AsignaPedidoController::class)
    ->names([
        'index' => 'asigna-pedidos.index',
        'create' => 'asigna-pedidos.create',
        'store' => 'asigna-pedidos.store',
        'edit' => 'asigna-pedidos.edit',
        'update' => 'asigna-pedidos.update',
        'destroy' => 'asigna-pedidos.destroy'
    ]);


Auth::routes();

// Ruta del dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
