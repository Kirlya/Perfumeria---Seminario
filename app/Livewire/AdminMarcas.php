<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminMarcas extends Component
{
    public $codigo;
    public $nombre;
    public $activo;

    public function mount(){
        
    }

    public function render()
    {
        return view('livewire.admin-marcas');
    }

    public function editmarca($codigo){
        $this->codigo = $codigo;
        $this->nombre = DB::table('marcas')->where('marcas.codigo','=',$this->codigo)->value('nombre');
        
        //dispatch nuevo metodo no mencionado en la documentacion
        //$this->dispatch('editsubc');

    }

    public function update(){
        DB::transaction(function (){
            DB::update('update marcas set nombre = '.json_encode($this->nombre).' where codigo = '.json_encode($this->codigo));
        });
    }

    public function desHab($codigo){
        $this->codigo = $codigo;
        $this->activo = DB::table('marcas')->where('marcas.codigo','=',$this->codigo)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update marcas set activo = '. 0 .' where codigo = '.json_encode($this->codigo));
            }else{
                DB::update('update marcas set activo = '. 1 .' where codigo = '.json_encode($this->codigo));
            }
        });

    }
}
