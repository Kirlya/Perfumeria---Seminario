@extends('layouts.layout2')
<!-- probando layout nuevo -->
 
    @php
        //a mejorar
        $producto_banner1 = DB::table('productos')->where('codigo',1010000)->value('productos.*');    
        $producto_banner2 = DB::table('productos')->where('codigo',1010001)->value('productos.*');
    @endphp
    @section('content')
    <!-- no mas absolute por ahora -->
    <div class="container-fluid ">
        <div class="carousel slide position-relative desktop-img" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{route('producto',['producto' => $producto_banner1])}}" >
                        <img src="{{ asset('public\img\banner2.jpg') }}" alt="!" class="carrousel-item" data-bs-interval="2000">
                    </a>
                    
                </div>
                <div class="carousel-item">
                    <a href="{{route('producto',['producto' => $producto_banner2])}}">
                        <img src="{{ asset('public\img\banner1.jpg') }}" alt="!" class="carrousel-item" data-bs-interval="2000">
                    </a>
                </div>
            </div>
            
        </div>
        
    </div>
    
    @endsection
