@extends('layouts.layout2')
    
    @php
        $cat_act = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','sub_categorias.id')->where('productos.codigo',$producto->codigo)->value('sub_categorias.activo');
        $sub_act = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','sub_categorias.id')->join('categorias','categorias.id','sub_categorias.categoria_id')->where('productos.codigo',$producto->codigo)->value('categorias.activo');
    @endphp
    @section('content')
    <!-- Aca estaria el brand mostrando la ruta del producto -->
    @if($sub_act && $cat_act)
        @livewire('verproducto', ['producto' => $producto])
    @else
        <div style="padding:2%;"><p>Lo sentimos producto no Disponible</p></div>    
    @endif
    @endsection
