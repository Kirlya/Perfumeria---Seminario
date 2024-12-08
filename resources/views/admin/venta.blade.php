@extends('layouts.adminlayout')

@section('content')
<div style="margin:2%">
    @php
        $ultimo = DB::table('compras')->max('fecha');
        $antiguo = DB::table('compras')->min('fecha');
        $fecha_ini = DateTime::createFromFormat('Y-m-d',$antiguo);
        $fecha_fin = DateTime::createFromFormat('Y-m-d',$ultimo);
        //dd($fecha_ini);
    @endphp
    @for($y = $fecha_ini->format('Y') ; $y <= $fecha_fin->format('Y') ; $y++)
        @for($i=1;$i<=12;$i++)
            @php
                $ventas = DB::table('compras')->whereMonth('fecha',$i)->get();
            @endphp
            @if(!empty($ventas->toArray()))
                <a href="{{route('pdf', ['mes' => $i, 'año' => $y] ) }}">Ventas del {{$i}} - {{$y}}</a>
                <br>
            @endif
        @endfor
    @endfor
</div>
@endsection