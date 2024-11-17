<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;

/*
Route::get('/', function () {
    return view('index');
});*/

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/favoritos',function(){
        return view('pagina.favoritos');
    })->name('favoritos');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/carrito',function(){
        return view('pagina.carrito');
    })->name('carrito');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/perfil',function(){
        return view('pagina.contacto');
    })->name('perfil');
});




//Route::get('/',[App\Http\Controllers\UsuarioController::class, 'index'])->name('home');
Route::post('/comprar',[App\Http\Controllers\MercadoPagoController::class,'comprar'])->name('comprar.post');
Route::get('/comprar',[App\Http\Controllers\ProductosCarritoController::class,'comprar'])->name('comprar');

Route::get('/comprobante/{response}',[App\Http\Controllers\MercadoPagoController::class,'comprobante']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//redireccionamiento exitoso a la view de carpeta login - views/login/login.blade.php
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'verificarlogin'])->name('verlogin');

Route::get('/productos/categoria/{ categoria }', [App\Http\Controllers\VerProductosController::class,'porCategoria'])->name('categoria');

Route::get('/productos/{producto}', [App\Http\Controllers\VerProductosController::class,'show'])->name('producto');


Route::get('/usuario',[App\Http\Controllers\UsuarioController::class,'index'])->name('usuario');

Route::get('/productos/categoria/{categoria_nombre}/subcategoria/{subcategoria_nombre}',[App\Http\Controllers\VerProductosController::class,'porSubCategoria'])->name('porsubcategoria');
//Route::post('/productos/categoria/{categoria_nombre}/subcategoria/{subcategoria_nombre}',[App\Http\Controllers\ProductosCarritoController::class,'agregarProducto'])->name('porsubcategoria');

Route::get('/contacto',[App\Http\Controllers\HomeController::class,'contacto'])->name('contacto');

Route::get('/registrar',[App\Http\Controllers\Auth\RegisterController::class,'index'])->name('menu-registrar');

Route::post('/registrar',[App\Http\Controllers\Auth\RegisterController::class,'create'])->name('registrar');

Route::get('/admin',[App\Http\Controllers\ProductoController::class,'menu'])->name('menu-admin');

Route::get('/admin/productos',[App\Http\Controllers\ProductoController::class,'menuProductos'])->name('admin-productos');
Route::get('/admin/crear/producto',[App\Http\Controllers\ProductoController::class,'create'])->name('producto.create');
Route::post('/admin/crear/producto',[App\Http\Controllers\ProductoController::class,'store'])->name('producto.store');
Route::get('admin/editar/producto',[App\Http\Controllers\ProductoController::class,'edit'])->name('producto.edit');
Route::post('admin/editar/producto',[App\Http\Controllers\ProductoController::class,'update'])->name('producto.update');

Route::get('admin/marcas',[App\Http\Controllers\MarcaController::class,'index'])->name('admin-marcas');
Route::get('admin/crear/marcas',[App\Http\Controllers\MarcaController::class,'create'])->name('marca.create');
Route::post('admin/crear/marcas',[App\Http\Controllers\MarcaController::class,'store'])->name('marca.store');
Route::get('admin/editar/marca',[App\Http\Controllers\MarcaController::class,'edit'])->name('marca.edit');
Route::post('admin/editar/marca',[App\Http\Controllers\MarcaController::class,'update'])->name('marca.update');

Route::get('admin/usuarios',[App\Http\Controllers\UsuarioController::class,'index'])->name('admin-usuarios');
Route::get('admin/crear/usuario',[App\Http\Controllers\UsuarioController::class,'crearUsuario'])->name('usuario.create');
Route::post('admin/crear/usuario',[App\Http\Controllers\UsuarioController::class,'create'])->name('usuario.store');
Route::get('admin/editar/usuario',[App\Http\Controllers\UsuarioController::class,'edit'])->name('usuario.edit');
Route::post('admin/editar/usuario',[App\Http\Controllers\UsuarioController::class,'update'])->name('usuario.update');

Route::get('admin/categorias',[App\Http\Controllers\CategoriaController::class,'index'])->name('admin-categorias');
Route::get('admin/crear/categoria',[App\Http\Controllers\CategoriaController::class,'create'])->name('categoria.create');
Route::post('admin/crear/categoria',[App\Http\Controllers\CategoriaController::class,'store'])->name('categoria.store');
Route::get('admin/editar/categoria',[App\Http\Controllers\CategoriaController::class,'edit'])->name('categoria.edit');
Route::post('admin/editar/categoria',[App\Http\Controllers\CategoriaController::class,'update'])->name('categoria.update');

Route::get('admin/subcategorias',[App\Http\Controllers\SubCategoriaController::class,'index'])->name('admin-subcategorias');
Route::get('admin/crear/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'create'])->name('subcategoria.create');
Route::post('admin/crear/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'store'])->name('subcategoria.store');
Route::get('admin/editar/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'edit'])->name('subcategoria.edit');
Route::post('admin/editar/subcategoria',[App\Http\Controllers\SubCategoriaController::class,'update'])->name('subcategoria.update');

Route::get('admin/etiquetas',[App\Http\Controllers\EtiquetaController::class,'index'])->name('admin-etiquetas');
Route::get('admin/crear/etiqueta',[App\Http\Controllers\EtiquetaController::class,'create'])->name('etiqueta.create');
Route::post('admin/crear/etiqueta',[App\Http\Controllers\EtiquetaController::class,'store'])->name('etiqueta.store');
Route::get('admin/editar/etiqueta',[App\Http\Controllers\EtiquetaController::class,'edit'])->name('etiqueta.edit');
Route::post('admin/editar/etiqueta',[App\Http\Controllers\EtiquetaController::class,'update'])->name('etiqueta.update');



Route::resources([
    'roles' => RoleController::class,
]); 