@extends('layouts.layout')
    @php 
        $cat = DB::table('categorias')->where('id',$categoria)->value('activo');
        $sub = DB::table('sub_categorias')->where('id',$subcategoria)->value('activo');
    @endphp
    @section('content')
    @if($cat && $sub)
        
        @livewire('subcategoriafiltro', ['categoria' => $categoria, 'subcategoria' => $subcategoria])  
    @else
        <div style="padding:2%">
            No se encuentra disponible por el momento
        </div>
    @endif

    
    

    @endsection
