<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminCategoria extends Component
{
    public $categorias;
    public $index;
    public $columna;

    public $ids;
    public $id;
    public $nombre;
    public $activo;

    public $order;

    public function mount(){
        $this->categorias = DB::table('categorias')->get();
        $this->order = 0;
    }

    public function render()
    {
        return view('livewire.admin-categoria');
    }

    public function ordenarPorId(){
        if($this->order){
            $this->order = 0;
            $this->categorias = DB::table('categorias')->orderBy('id','desc')->get();
        }else{
            $this->order = 1;
            $this->categorias = DB::table('categorias')->orderBy('id')->get();
        }
    }

    public function ordenarPorNombre(){
        if($this->order){
            $this->order = 0;
            $this->categorias = DB::table('categorias')->orderBy('nombre','desc')->get();
        }else{
            $this->order = 1;
            $this->categorias = DB::table('categorias')->orderBy('nombre')->get();
        }
    }

    public function ordenarPorActivo(){
        if($this->order){
            $this->order = 0;
            $this->categorias = DB::table('categorias')->orderBy('activo','desc')->get();
        }else{
            $this->order = 1;
            $this->categorias = DB::table('categorias')->orderBy('activo')->get();
        }
    }

    public function editc($id)
    {
        $this->ids = $id;
        $this->column = array_column($this->categorias->toArray(),'id');
        $this->index = array_search($id,$this->column);


        $this->nombre = $this->categorias[$this->index]->nombre;
    }

    public function update()
    {
        DB::transaction(function(){
            DB::update('update categorias set nombre = '.json_encode($this->nombre).' where id = '.$this->ids);
        });
        $this->categorias[$this->index]->nombre = $this->nombre;
    }

    public function desHab($id){
        $this->ids = $id;
        $this->column = array_column($this->categorias->toArray(),'id');
        $this->index = array_search($id,$this->column);
        $this->activo = DB::table('categorias')->where('categorias.id','=',$this->ids)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update categorias set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update categorias set activo = '. 1 .' where id = '.$this->ids);
            }
        });
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }

        $this->categorias[$this->index]->activo = $this->activo;
    }

}
