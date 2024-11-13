<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Busqueda extends Component
{
    public $busqueda = '';

    public $productos;



    public function render()
    {
        /*
        return <<<'blade'
        <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" wire:keydown="buscar" wire:model="busqueda">
                @if(isset ($productos) && count($productos) > 0 && $this->busqueda <> '')
                 @foreach ($productos as $producto)
                        <div>{{ $producto->nombre }} </div>
                    @endforeach
                @endif
                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
        </form>
        blade; */
        return view('livewire.busqueda');
    }

    public function buscar()
    {
        $this->productos = Producto::where('nombre','like',"%{$this->busqueda}%")->where('activo','=',1)->limit(3)->get();
    }
}
