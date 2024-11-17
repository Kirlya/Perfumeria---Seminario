<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminMarcas extends Component
{
    public $codigo;
    public $nombre;
    public $activo;

    public $marcas;
    public $index;
    public $columna;
    public $order;

    public function mount(){
        $this->marcas = DB::table('marcas')->get();
        $this->order = 0;
    }

    public function render()
    {
        return view('livewire.admin-marcas');
    }

public function ordenarPorCodigo(){
    if($this->order){
        $this->order = 0;
        $this->marcas = DB::table('marcas')->orderBy('codigo','desc')->get();
    }else{
        $this->order = 1;
        $this->marcas = DB::table('marcas')->orderBy('codigo')->get();
    }
}    

public function ordenarPorNombre(){
    if($this->order){
        $this->order = 0;
        $this->marcas = DB::table('marcas')->orderBy('nombre','desc')->get();
    }else{
        $this->order = 1;
        $this->marcas = DB::table('marcas')->orderBy('nombre')->get();
    }
}    

public function ordenarPorActivo(){
    if($this->order){
        $this->order = 0;
        $this->marcas = DB::table('marcas')->orderBy('activo','desc')->get();
    }else{
        $this->order = 1;
        $this->marcas = DB::table('marcas')->orderBy('activo')->get();
    }
}



    public function editmarca($codigo){
        $this->codigo = $codigo;
        $this->columna = array_column($this->marcas->toArray(),'codigo');
        $this->index = array_search($codigo,$this->columna);

        $this->nombre = $this->marcas[$this->index]->nombre;
        
        //dispatch nuevo metodo no mencionado en la documentacion
        //$this->dispatch('editsubc');

    }

    public function update(){
        DB::transaction(function (){
            DB::update('update marcas set nombre = '.json_encode($this->nombre).' where codigo = '.json_encode($this->codigo));
        });
        $this->marcas[$this->index]->nombre = $this->nombre;
    }

    public function desHab($codigo){
        $this->codigo = $codigo;
        $this->columna = array_column($this->marcas->toArray(),'codigo');
        $this->index = array_search($codigo,$this->columna);
        $this->activo = $this->marcas[$this->index]->activo;
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update marcas set activo = '. 0 .' where codigo = '.json_encode($this->codigo));
            }else{
                DB::update('update marcas set activo = '. 1 .' where codigo = '.json_encode($this->codigo));
            }
        });
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }
        $this->marcas[$this->index]->activo = $this->activo;
    }
}
