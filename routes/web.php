<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\ItemNotFoundException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});

Route::get('/prueba', function() {
    return view('prueba');
});

/* Auth */ 

Route::get('/login', [customAuthController::class, 'login']);

Route::get('/register', [customAuthController::class, 'register']);

Route::post('/register-user', [customAuthController::class, 'registerUser'])->name('register-user');

Route::post('login-user', [customAuthController::class, 'loginUser'])->name('login-user');

Route::get('/dashboard', [customAuthController::class, 'dashboard']);

/* Inventario */

Route::get('/inventario/mostrar/items', [ItemController::class, 'show']);

Route::get('/inventario/agregar/item', [ItemController::class, 'addItem']);

Route::post('/inventario/agregar/item', [ItemController::class, 'agregarItem']);

Route::get('/inventario/actualizar/item/{id}', [ItemController::class, 'getInfoItem']);

Route::post('/inventario/actualizar/item', [ItemController::class, 'updateItem']);

Route::post('/inventario/eliminar/item/{id}', [ItemController::class, 'deleteItem']);

Route::get('/inventario/agregar/items', [ItemController::class, 'addItems']);

Route::post('/inventario/agregar/items', [ItemController::class, 'agregarItems']);

/* Vendedor */

Route::get('/vendedor/mostrar', [VendedorController::class, 'show']);

Route::get('/vendedor/actualizar/{id}', [VendedorController::class, 'getInfoVendedor']);

Route::post('/vendedor/actualizar/{id}', [VendedorController::class, 'updateVendedor']);

Route::post('/vendedor/eliminar/{id}', [VendedorController::class, 'eliminarVendedor']);

/* Cliente */

Route::get('/cliente/mostrar', [ClienteController::class, 'show']);

/* Ventas */

Route::get('/ventas/mostrar', function () {
    return view('Ventas.mostrar-ventas');
});

Route::get('/ventas/venderes', function () {
    return view('Ventas.vender');
});

Route::post('/ventas/vender', [VentasController::class, 'realizarVenta']);

Route::get('/ventas/mostrar', [VentasController::class, 'show']);

Route::get('/ventas/descargar', [VentasController::class, 'generarReporteDeVentas']);

/* Admin */

Route::get('/admin/aniadir/vendedores', [VendedorController::class, 'showAdmin']);

Route::post('/admin/aniadir/vendedores', [VendedorController::class, 'aniadirVendedor']);
