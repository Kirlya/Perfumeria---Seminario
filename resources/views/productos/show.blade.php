@extends('layouts.layout')
 
    @section('content')
    @livewire('verproducto', ['producto' => $producto])
    
    
    @endsection
