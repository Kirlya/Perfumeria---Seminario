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

Route::get('admin/usuarios',[App\Http\Controllers\UsuarioController::class,'index'])->name('admin-usuarios');
Route::get('admin/crear/usuario',[App\Http\Controllers\UsuarioController::class,'crearUsuario'])->name('crear-usuario');
Route::post('admin/crear/usuario',[App\Http\Controllers\UsuarioController::class,'create'])->name('crear-usuario');

Route::get('admin/categorias',[App\Http\Controllers\CategoriaController::class,'index'])->name('admin-categorias');
Route::get('admin/crear/categoria',[App\Http\Controllers\CategoriaController::class,'create'])->name('crear-categoria');
Route::post('admin/crear/categoria',[App\Http\Controllers\CategoriaController::class,'store'])->name('crear-categoria');

Route::get('admin/subcategorias',[App\Http\Controllers\SubCategoriaController::class,'index'])->name('admin-subcategorias');
Route::get('admin/crear/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'create'])->name('crear-subcategoria');
Route::post('admin/crear/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'store'])->name('crear-subcategoria');

Route::get('admin/etiquetas',[App\Http\Controllers\EtiquetaController::class,'index'])->name('admin-etiquetas');
Route::get('admin/crear/etiqueta',[App\Http\Controllers\EtiquetaController::class,'create'])->name('crear-etiqueta');
Route::post('admin/crear/etiqueta',[App\Http\Controllers\EtiquetaController::class,'store'])->name('crear-etiqueta');



Route::resources([
    'roles' => RoleController::class,
    'usuario' => UsuarioController::class,
    'products' => ProductoController::class,
]); 