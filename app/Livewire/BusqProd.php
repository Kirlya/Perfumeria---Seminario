<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class BusqProd extends Component
{
    public $productos;
    public $busqueda = "";

    public function render()
    {
        return view('livewire.busq-prod');
    }


    public function buscarProducto(){
        $this->productos = Producto::where('codigo','like',"%{$this->busqueda}%")->orWhere('nombre','like',"%{$this->busqueda}%")->limit(3)->get();
    }

    public function terminarBusq($producto){
        
        $this->busqueda = $producto['codigo'];
        $this->productos = [];
    }
}
