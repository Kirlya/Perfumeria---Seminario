@extends('layouts.adminlayout')

@section('content')
    @php
        $user = auth()->user();
        
    @endphp
    <p>Bienvenido {{$user->nombre}} {{$user->apellido}}</p>
    
@endsection