<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\HomeController;

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


Auth::routes();

// Ruta del dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
