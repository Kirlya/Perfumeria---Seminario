@extends('layouts.layout')
 
    @section('content')
    <div class="container-prod container-fluid">
            <img src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}" id="producto-foto">
        <div id="desc-producto">
            <h3>{{$producto->nombre}}</h3>
            @php
                $marca = DB::table('marcas')->where('marcas.codigo',$producto->cod_marca)->value('nombre');
            @endphp
            <h5>{{$marca}}</h5>
            <p>{{$producto->precio}}</p>
            <p style="align-self: center">{{$producto->descripcion}}</p>
            <br>
            <a href="{{route('comprar')}}" class="btn btn-primary violeta perf-btn">Comprar</a>
            <br>
            <a href="" class="btn btn-primary violeta perf-btn">Añadir al Carrito</a>
        </div>
        
    </div>
    
    
    @endsection
