@extends('layouts.layout')
 
    @section('content')
    @php
        $compras = DB::table('compras')->where('usuario',Auth::id())->paginate(10)->withQueryString();
        //dd($compras);
    @endphp
    <div style="margin:2%">
        <h2>Compras</h2>
       @foreach ($compras as $compra)
        @php
            $listado = DB::table('detalle_compras')->join('productos','detalle_compras.cod_prod','=','productos.codigo')->join('compras','detalle_compras.N_Factura','=','compras.N_Factura')->where('compras.usuario',Auth::id())->where('compras.N_Factura','=',$compra->N_Factura)->select('productos.imagen','productos.nombre','detalle_compras.precio_unit','detalle_compras.cantidad')->get();
            /* $result = Producto::leftJoin('detalle_compras', 'productos.codigo', '=', 'detalle_compras.cod_prod')
            ->select('productos.*')
            ->where('productos.categoria', '=', $categoria)    // Filtra por categoría
            ->where('productos.subcategoria', '=', $subcategoria) // Filtra por subcategoría
            ->groupBy('detalle_compras.cod_prod')
            ->orderByRaw('count(detalle_compras.cod_prod) desc')
            ->get(); */
        @endphp
        <div style="padding-top:2%">
            N° Factura: {{$compra->N_Factura}}
            @foreach($listado as $item)
                <br>    
                <img src="{{asset($item->imagen)}}" alt="" height="100px">
                {{$item->nombre}}
                {{$item->precio_unit}}
            @endforeach
        </div>    
       
       @endforeach
        
    </div>
    
    
    @endsection
