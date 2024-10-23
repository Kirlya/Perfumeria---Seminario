@extends('layouts.adminlayout')

@section('content')
    @php
        $productos = DB::table('productos')->get();
    @endphp
    <h2>Productos</h2>
    <button class="btn btn-dark"><a href="{{route('crear-producto')}}" style="text-decoration: none;color:white">Crear Producto</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">SubCategoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @php
                    $marca = DB::table('productos')->join('marcas','productos.marca_id','=','marcas.id')->where('productos.id','=',$producto->id)->value('marcas.nombre')->first();
                    $subcategoria = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.id','=',$producto->id)->value('sub_categorias.nombre')->first();
                    @endphp
                    <tr>
                        <th scope="row">{{$producto->id}}</th>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>{{ $producto->imagen }}</td>
                        <td>{{ $producto->activo }}</td>
                        <td>{{ $marca }}</td>
                        <td>{{ $subcategoria }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection