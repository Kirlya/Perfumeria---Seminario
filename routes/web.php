<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//redireccionamiento exitoso a la view de carpeta login - views/login/login.blade.php
Route::get('/login', [App\Http\Controllers\UsuarioController::class, 'login'])->name('login');

Route::get('/productos/{ categoria.name }', [App\Http\Controllers\ProductoController::class,'porCategoria'])->name('categoria');

Route::get('/productos/{ id }', [App\Http\Controllers\ProductoController::class,'show'])->name('producto');

Route::get('/usuario',[App\Http\Controllers\UsuarioController::class,'index'])->name('usuario');

Route::get('/productos/{ categoria.name }/{ subcategoria.name }',[App\Http\Controllers\ProductoController::class,'porSubCategoria'])->name('subcategoria');

Route::get('/contacto',[App\Http\Controllers\HomeController::class,'contacto'])->name('contacto');