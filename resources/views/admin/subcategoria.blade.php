@extends('layouts.adminlayout')

@section('content')
    @php
        $subcategorias = DB::table('sub_categorias')->get();
    @endphp
    <h2>SubCategorias</h2>
    <button class="btn btn-dark"><a href="{{route('crear-subcategoria')}}" style="text-decoration: none;color:white">Crear SubCategoria</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategorias as $subcategoria)
                    <tr>
                        <th scope="row">{{$subcategoria->id}}</th>
                        <td>{{ $subcategoria->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection