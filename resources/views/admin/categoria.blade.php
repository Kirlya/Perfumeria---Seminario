@extends('layouts.adminlayout')

@section('content')
    @php
        $categorias = DB::table('categorias')->get();
    @endphp
    <h2>Categorias</h2>
    <button class="btn btn-dark"><a href="{{route('categoria.create')}}" style="text-decoration: none;color:white">Crear Categoria</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <th scope="row">{{$categoria->id}}</th>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection