@extends('layouts.layout')
 
    @section('content')
    @php
        $productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
    @endphp
    @livewire('verCarrito',['productos' => $productos])
    
    @endsection
