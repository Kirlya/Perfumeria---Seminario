<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminEtiqueta extends Component
{

    public $ids;
    public $nombre;
    public $activo;

    public function render()
    {
        return view('livewire.admin-etiqueta');
    }
    
    public function editaret($id){
        $this->ids = $id;
        $this->nombre = DB::table('etiquetas')->where('etiquetas.id','=',$this->ids)->value('nombre');
    }

    public function update(){
        DB::transaction(function(){
            DB::update('update etiquetas set nombre = '.json_encode($this->nombre).' where id = '.$this->ids);
        });
    }

    public function desHab($id){
        $this->ids = $id;
        $this->activo = DB::table('etiquetas')->where('etiquetas.id','=',$this->ids)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update etiquetas set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update etiquetas set activo = '. 1 .' where id = '.$this->ids);
            }
        });
    }
}