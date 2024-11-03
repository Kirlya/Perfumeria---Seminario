@extends('layouts.layout')
 
    @section('content')
    @php
    use App\Models\Producto;
        $productos = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.subcategoria_id','=',$subcategoria)->where('sub_categorias.categoria_id','=',$categoria)->select('productos.*')->get();
    @endphp

    <div class="lista-productos container-fluid">
        @foreach ($productos as $product)
            <img src="{{asset($product->imagen)}}" alt="" style="width: 10%; height: 10%">
            <!-- Visible o no para solo los tipo Usuario probablemente Redireccion a login -->
            @php
               $producto = Producto::find($product->id);
            @endphp
            @can('ver-producto')
            <a href="{{route('producto', $producto )}}" style="text-decoration:none;color:black;" class="btn btn-primary">Agregar al Carrito</a>
       
            @endcan
        @endforeach
    </div>
    

    @endsection
