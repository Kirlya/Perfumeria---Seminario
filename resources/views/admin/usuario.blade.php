@extends('layouts.adminlayout')

@section('content')
    @php
        $usuarios = DB::table('usuarios')->get();
    @endphp
    <h2>Usuarios</h2>
    <button class="btn btn-dark"><a href="{{route('crear-usuario')}}" style="text-decoration: none;color:white">Crear Usuario</a></button>
    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    @php
                    $rol = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->where('usuarios.id','=',$usuario->id)->value('roles.name');
                    @endphp
                    <tr>
                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->activo }}</td>
                        <td>{{ $rol }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection