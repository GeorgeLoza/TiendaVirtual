<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\DetallePedidoController;

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


/*Route::get('/', function () {
    return view('principal');  
    
    
});*/

/*Tienda */
Route::get('/',[TiendaController::class, 'index'])->name('index');
/*Registro de usuarios */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/personal/{user}/edit',[RegisterController::class, 'edit'])->name('personal.edit');
Route::put('/personal/{user}',[UserController::class, 'update'])->name('personal.update');
/*ingreo y salida de usuarios */
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']); 
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');


/*Rutas de producto */
Route::get('/producto',[ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create',[ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto',[ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/{producto}/edit',[ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{producto}',[ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/{producto}',[ProductoController::class, 'destroy'])->name('producto.destroy');

/*Rutas de categoria */
Route::get('/categoria',[CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create',[CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria',[CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{categoria}/edit',[CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{categoria}',[CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{categoria}',[CategoriaController::class, 'destroy'])->name('categoria.destroy');

/*Rutas de usuarios */
Route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
Route::post('/user',[UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::get('/personal/{user}/edit',[RegisterController::class, 'edit'])->name('personal.edit');
Route::put('/user/{user}',[UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}',[UserController::class, 'destroy'])->name('user.destroy');

/*Rutas de proveedor */
Route::get('/proveedor',[ProveedorController::class, 'index'])->name('proveedor.index');
Route::get('/proveedor/create',[ProveedorController::class, 'create'])->name('proveedor.create');
Route::post('/proveedor',[ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('/proveedor/{proveedor}/edit',[ProveedorController::class, 'edit'])->name('proveedor.edit');
Route::put('/proveedor/{proveedor}',[ProveedorController::class, 'update'])->name('proveedor.update');
Route::delete('/proveedor/{proveedor}',[ProveedorController::class, 'destroy'])->name('proveedor.destroy');

/*imagenes */
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');




/* Detalle_pedido_cliente*/
Route::get('/detallePedido',[DetallePedidoController::class, 'index'])->name('detallePedido.index');
Route::post('/detallePedido',[DetallePedidoController::class, 'store'])->name('detallePedido.store');
Route::put('/detallePedido/{detallePedido}',[DetallePedidoController::class, 'update'])->name('detallePedido.update');
Route::delete('/detallePedido/{detallePedido}',[DetallePedidoController::class, 'destroy'])->name('detallePedido.destroy');

/*pedido_cliente */
Route::post('/pedido',[PedidoController::class, 'store'])->name('pedido.store');

/*pedido_empleado*/
Route::get('/pedido',[PedidoController::class, 'index'])->name('pedido.index');
Route::put('/pedido/{pedido}',[PedidoController::class, 'update'])->name('pedido.update');