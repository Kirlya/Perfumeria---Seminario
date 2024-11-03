@extends('layouts.adminlayout')

@section('content')
    @php
        $etiquetas = DB::table('etiquetas')->get();
    @endphp
    <h2>Etiquetas</h2>
    <button class="btn btn-dark"><a href="{{route('etiqueta.create')}}" style="text-decoration: none;color:white">Crear Etiqueta</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etiquetas as $etiqueta)
                    <tr>
                        <th scope="row">{{$etiqueta->id}}</th>
                        <td>{{ $etiqueta->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection