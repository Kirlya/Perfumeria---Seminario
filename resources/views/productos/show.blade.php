@extends('layouts.layout')
    
    @php
        $cat_act = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','sub_categorias.id')->where('productos.codigo',$producto->codigo)->value('sub_categorias.activo');
        $sub_act = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','sub_categorias.id')->join('categorias','categorias.id','sub_categorias.categoria_id')->where('productos.codigo',$producto->codigo)->value('categorias.activo');
    @endphp
    @section('content')
    @if($sub_act && $cat_act)
        @livewire('verproducto', ['producto' => $producto])
    @else
        <div style="padding:2%;">Lo sentimos producto no Disponible</div>    
    @endif
    @endsection
