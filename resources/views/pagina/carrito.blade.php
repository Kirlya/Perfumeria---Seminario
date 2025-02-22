@extends('layouts.layout2')
    @section('content')
    @php
        $productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
    @endphp
    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
    @livewire('verCarrito',['productos' => $productos])
    
    @endsection
