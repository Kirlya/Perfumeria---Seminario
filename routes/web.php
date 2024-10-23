<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//Route::get('/',[App\Http\Controllers\UsuarioController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//redireccionamiento exitoso a la view de carpeta login - views/login/login.blade.php
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'verificarlogin'])->name('verlogin');

Route::get('/productos/{ categoria.name }', [App\Http\Controllers\ProductoController::class,'porCategoria'])->name('categoria');

Route::get('/productos/{ id }', [App\Http\Controllers\ProductoController::class,'show'])->name('producto');

Route::get('/usuario',[App\Http\Controllers\UsuarioController::class,'index'])->name('usuario');

Route::get('/productos/{ categoria.name }/{ subcategoria.name }',[App\Http\Controllers\ProductoController::class,'porSubCategoria'])->name('subcategoria');

Route::get('/contacto',[App\Http\Controllers\HomeController::class,'contacto'])->name('contacto');

Route::get('/registrar',[App\Http\Controllers\Auth\RegisterController::class,'index'])->name('menu-registrar');

Route::post('/registrar',[App\Http\Controllers\Auth\RegisterController::class,'create'])->name('registrar');

Route::get('/admin',[App\Http\Controllers\ProductoController::class,'menu'])->name('menu-admin');

Route::get('/admin/productos',[App\Http\Controllers\ProductoController::class,'menuProductos'])->name('admin-productos');

Route::get('/admin/crear/producto',[App\Http\Controllers\ProductoController::class,'create'])->name('crear-producto');

Route::post('/admin/crear/producto',[App\Http\Controllers\ProductoController::class,'store'])->name('crear-producto');

Route::get('admin/marcas',[App\Http\Controllers\MarcaController::class,'index'])->name('admin-marcas');

Route::get('admin/crear/marcas',[App\Http\Controllers\MarcaController::class,'create'])->name('crear-marca');

Route::post('admin/crear/marcas',[App\Http\Controllers\MarcaController::class,'store'])->name('crear-marca');


Route::resources([
    'roles' => RoleController::class,
    'usuario' => UsuarioController::class,
    'products' => ProductoController::class,
]); 