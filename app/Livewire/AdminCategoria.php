<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminCategoria extends Component
{
    public $ids;
    public $nombre;
    public $activo;

    public function render()
    {
        return view('livewire.admin-categoria');
    }

    public function editc($id)
    {
        $this->ids = $id;
        $this->nombre = DB::table('categorias')->where('categorias.id','=',$this->ids)->value('nombre');
    }

    public function update()
    {
        DB::transaction(function(){
            DB::update('update categorias set nombre = '.json_encode($this->nombre).' where id = '.$this->ids);
        });
    }

    public function desHab($id){
        $this->ids = $id;
        $this->activo = DB::table('categorias')->where('categorias.id','=',$this->ids)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update categorias set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update categorias set activo = '. 1 .' where id = '.$this->ids);
            }
        });
    }

}
