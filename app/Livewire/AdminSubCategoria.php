<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class AdminSubCategoria extends Component
{
    public $id;
    public $ids;
    public $nombre;
    public $category;
    public $cat;
    public $activo;
    public $subcategorias;
    public $orden;
    public $column;
    public $index;

    public function mount(){
        $this->subcategorias = DB::table('sub_categorias')->get();
        $this->orden = 0;
    }

    public function render()
    {
        return view('livewire.admin-sub-categoria');
    }

    /*
    public function editsubc(Subcategoria $subcategoria){
        $this->subcategoria = $subcategoria;
        //dispatch nuevo metodo no mencionado en la documentacion
        $this->dispatch('editsubc');

    }*/


    public function ordenarPorNombre(){
        
        if($this->orden){
            $this->orden = 0;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('nombre','desc')->get();
        }else{
            $this->orden = 1;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('nombre')->get();
        }
        
    }

    public function ordenarPorId(){
        
        if($this->orden){
            $this->orden = 0;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('id','desc')->get();
        }else{
            $this->orden = 1;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('id')->get();
        }
        
    }

    public function ordenarPorActivo(){
        
        if($this->orden){
            $this->orden = 0;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('activo','desc')->get();
        }else{
            $this->orden = 1;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('activo')->get();
        }
        
    }

    public function ordenarPorCategoria(){
        if($this->orden){
            $this->subcategorias = DB::table('sub_categorias')->orderBy('categoria_id','desc')->get();
            $this->orden = 0;
        }else{
            $this->orden = 1;
            $this->subcategorias = DB::table('sub_categorias')->orderBy('categoria_id')->get();
        }
    }

    public function editsubc($id){
        $this->column = array_column($this->subcategorias->toArray(),'id');
        $this->index = array_search($id,$this->column);
        $this->ids = $id;
        $this->nombre = $this->subcategorias[$this->index]->nombre;
        //$this->nombre = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->ids)->value('nombre');
        $this->category = DB::table('sub_categorias')->join('categorias','sub_categorias.categoria_id','=','categorias.id')->where('sub_categorias.id','=',$this->ids)->value('categorias.nombre');
        //dispatch nuevo metodo no mencionado en la documentacion
        //$this->dispatch('editsubc');

    }

    public function update(){

        $this->cat = DB::table('categorias')->where('categorias.nombre','=',$this->category)->value('id');
        
        $this->subcategorias[$this->index]->nombre = $this->nombre;
        $this->subcategorias[$this->index]->categoria_id = $this->cat;


        DB::transaction(function () {
            DB::update('update sub_categorias set nombre = "'.$this->nombre.'", categoria_id = '. $this->cat .' where id = '.$this->ids);
        }); 
        
    }

    public function desHab($id){
        $this->ids = $id;
        $this->column = array_column($this->subcategorias->toArray(),'id');
        $this->index = array_search($id,$this->column);
        $this->activo = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->ids)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update sub_categorias set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update sub_categorias set activo = '. 1 .' where id = '.$this->ids);
            }
        });
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }

        $this->subcategorias[$this->index]->activo = $this->activo;
    }
    

}
