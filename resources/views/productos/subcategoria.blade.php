@extends('layouts.layout')
 
    @section('content')
    @livewire('subcategoriafiltro', ['categoria' => $categoria, 'subcategoria' => $subcategoria])


    
    

    @endsection
