@extends('layouts.layout')
 
    @section('content')
    <div class="lista-productos container-fluid">
        {{$producto}}
    </div>
    <a href="{{route('comprar')}}">Comprar</a>
    
    @endsection
