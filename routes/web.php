<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function () {
    return view('empresa');
});


Route::get('/vela', function () {
    return view('vela');
})->name('vela');

Route::resource('envios', App\Http\Controllers\EnvioController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Auth::routes();


