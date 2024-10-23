@extends('layouts.adminlayout')

@section('content')
    @php
        $marcas = DB::table('marcas')->get();
    @endphp
    <h2>Marcas</h2>
    <button class="btn btn-dark"><a href="{{route('crear-marca')}}" style="text-decoration: none;color:white">Crear Marca</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <th scope="row">{{$marca->id}}</th>
                        <td>{{ $marca->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection