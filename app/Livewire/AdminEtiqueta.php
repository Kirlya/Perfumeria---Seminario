<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminEtiqueta extends Component
{

    public $ids;
    public $nombre;
    public $activo;

    public $etiquetas;
    public $order;
    public $columna;
    public $index;

    public function mount(){
        $this->order = 0;
        $this->etiquetas = DB::table('etiquetas')->get();
    }

    public function render()
    {
        return view('livewire.admin-etiqueta');
    }

    public function ordenarPorId(){
        if($this->order){
            $this->order = 0;
            $this->etiquetas = DB::table('etiquetas')->orderBy('id','desc')->get();
        }else{
            $this->order = 1;
            $this->etiquetas = DB::table('etiquetas')->orderBy('id')->get();
        }
    }

    public function ordenarPorNombre(){
        if($this->order){
            $this->order = 0;
            $this->etiquetas = DB::table('etiquetas')->orderBy('nombre','desc')->get();
        }else{
            $this->order = 1;
            $this->etiquetas = DB::table('etiquetas')->orderBy('nombre')->get();
        }
    }

    public function ordenarPorActivo(){
        if($this->order){
            $this->order = 0;
            $this->etiquetas = DB::table('etiquetas')->orderBy('activo','desc')->get();
        }else{
            $this->order = 1;
            $this->etiquetas = DB::table('etiquetas')->orderBy('activo')->get();
        }
    }    
    
    public function editaret($id){
        $this->ids = $id;
        $this->columna = array_column($this->etiquetas->toArray(),'id');
        $this->index = array_search($id,$this->columna);
        $this->nombre = $this->etiquetas[$this->index]->nombre;
    }

    public function update(){
        DB::transaction(function(){
            DB::update('update etiquetas set nombre = '.json_encode($this->nombre).' where id = '.$this->ids);
        });
        $this->etiquetas[$this->index]->nombre = $this->nombre;
    }

    public function desHab($id){
        $this->ids = $id;
        $this->columna = array_column($this->etiquetas->toArray(),'id');
        $this->index = array_search($id,$this->columna);
        $this->activo = $this->etiquetas[$this->index]->activo;
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update etiquetas set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update etiquetas set activo = '. 1 .' where id = '.$this->ids);
            }
        });
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }
        $this->etiquetas[$this->index]->activo = $this->activo;
    }
}