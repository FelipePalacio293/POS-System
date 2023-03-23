<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;

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
    return view('auth.login');
});

Route::get('/prueba', function() {
    return view('prueba');
});

/* Auth */ 
Route::get('/login', [customAuthController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/administrative/login', function() {
    return view('auth.login');
})->middleware('alreadyLoggedIn');

Route::post('/login/user', [customAuthController::class, 'loginUsuario']);

Route::get('/register', [customAuthController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/register-user', [customAuthController::class, 'registerUser'])->name('register-user');

Route::post('login-user', [customAuthController::class, 'loginUser'])->name('login-user');

Route::get('/dashboard', [customAuthController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [customAuthController::class, 'logout']);

/* Inventario */

Route::get('/get-item-data', [ItemController::class, 'getItemNameAndPrice']);

Route::get('/inventario/mostrar/items', [ItemController::class, 'show'])->middleware('VendedorAccess');

Route::get('/inventario/agregar/item', [ItemController::class, 'addItem'])->middleware('VendedorAccess');

Route::post('/inventario/agregar/item', [ItemController::class, 'agregarItem'])->middleware('VendedorAccess');

Route::get('/inventario/actualizar/item/{id}', [ItemController::class, 'getInfoItem'])->middleware('VendedorAccess');

Route::post('/inventario/actualizar/item', [ItemController::class, 'updateItem'])->middleware('VendedorAccess');

Route::post('/inventario/eliminar/item/{id}', [ItemController::class, 'deleteItem'])->middleware('VendedorAccess');

Route::get('/inventario/agregar/items', [ItemController::class, 'addItems'])->middleware('VendedorAccess');

Route::post('/inventario/agregar/items', [ItemController::class, 'agregarItems'])->middleware('VendedorAccess');

/* Vendedor */

Route::get('/vendedor/mostrar', [VendedorController::class, 'show'])->middleware('AdminAccess');;

Route::get('/vendedor/actualizar/{id}', [VendedorController::class, 'getInfoVendedor'])->middleware('AdminAccess');;

Route::post('/vendedor/actualizar/{id}', [VendedorController::class, 'updateVendedor'])->middleware('AdminAccess');;

Route::post('/vendedor/eliminar/{id}', [VendedorController::class, 'eliminarVendedor'])->middleware('AdminAccess');;

/* Cliente */

Route::get('/cliente/mostrar', [ClienteController::class, 'show']);

/* Ventas */

Route::get('/ventas/mostrar', function () {
    return view('Ventas.mostrar-ventas');
})->middleware('AdminAccess');;

Route::get('/ventas/venderes', function () {
    return view('Ventas.vender');
})->middleware('VendedorAccess');

Route::post('/ventas/vender', [VentasController::class, 'realizarVenta']);

Route::get('/ventas/mostrar', [VentasController::class, 'show'])->middleware('AdminAccess');

Route::get('/ventas/descargar', [VentasController::class, 'generarReporteDeVentas'])->middleware('AdminAccess');;

/* Admin */

Route::get('/admin/register', function (){
    return view('admin.adminRegister');
})->middleware('AdminAccess');

Route::post('/register-user-admin', [customAuthController::class, 'registerUser'])->name('register-user-admin')->middleware('AdminAccess');

Route::get('/admin/aniadir/vendedores', [VendedorController::class, 'showAdmin'])->middleware('AdminAccess');

Route::get('/admin/aniadir/rol', [UserController::class, 'show'])->middleware('AdminAccess');

Route::post('/admin/aniadir/vendedores', [VendedorController::class, 'aniadirVendedor'])->middleware('AdminAccess');

Route::get('/search', [VentasController::class, 'search'])->name('search');

Route::post('/admin/user/delete/{id}', [UserController::class, 'delete'])->middleware('AdminAccess');

Route::get('/admin/user/update/{id}', [UserController::class, 'update'])->middleware('AdminAccess');

Route::post('/admin/update/user/{id}', [UserController::class, 'updateUser'])->middleware('AdminAccess');

Route::get('/prueba22', [UserController::class, 'prueba'])->middleware('AdminAccess');

Route::get('/items/rotaciones', [VentasController::class, 'verRotacionesProductos']);

Route::get('/get-item-data2', [ItemController::class, 'getItemNameAndPrice2']);

/* User */

Route::post('/usuario/registro/{id}', [ClienteController::class, 'createCliente'])->middleware('UsuarioAccess');