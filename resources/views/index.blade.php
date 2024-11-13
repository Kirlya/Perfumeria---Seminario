@extends('layouts.layout')
 
    @section('content')
    <div class="container-fluid ">
        <div class="carousel slide position-absolute top-50 start-50 translate-middle" data-bs-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('public\img\banner2.webp') }}" alt="!" class="carrousel-item" data-bs-interval="2000">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('public\img\banner1.jpg') }}" alt="!" class="carrousel-item" data-bs-interval="2000">
                </div>
            </div>
            
        </div>
        
    </div>
    
    @endsection
