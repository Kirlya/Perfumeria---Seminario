@extends('layouts.adminlayout2')

@section('content')
    @php
        $user = auth()->user();

    @endphp
    <p class="p-l">Bienvenido {{$user->nombre}} {{$user->apellido}}</p>
    <div id="admin-index" class="container">
        <div>
            <h2>Ventas Semanales</h2>
        </div>
        <div>
            <h2>Mes con mejor venta</h2>
        </div>
        <div>
            <h2>Producto mas solicitado</h2>
        </div>
        <div>
            <h2>Grupo de clientes</h2>
            <!-- inserte grafico de torta -->
        </div>
    </div>
    
    
@endsection
