<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class AdminSubCategoria extends Component
{
    public $ids;
    public $nombre;
    public $category;
    public $cat;
    public $activo;

    public function mount(){
        
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

    public function editsubc($id){
        $this->ids = $id;
        $this->nombre = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->ids)->value('nombre');
        $this->category = DB::table('sub_categorias')->join('categorias','sub_categorias.categoria_id','=','categorias.id')->where('sub_categorias.id','=',$this->ids)->value('categorias.nombre');
        //dispatch nuevo metodo no mencionado en la documentacion
        //$this->dispatch('editsubc');

    }

    public function update(){

        $this->cat = DB::table('categorias')->where('categorias.nombre','=',$this->category)->value('id');
        //$subcategoria = SubCategoria::where('id','=',$this->ids)->firstOrFail();
        //dd($subcategoria);
        //$subcategoria->nombre = $this->nombre;
        //dd($subcategoria->nombre);
        //$categoria = Categoria::where('nombre', $this->category)->first();
        
        //$subcategoria->categoria_id = $categoria;
        //dd($subcategoria);
        //$activo = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->ids)->value('activo');
        //$subcategoria->activo = $activo;
        //dd($subcategoria);

        
        
        DB::transaction(function () {
            DB::update('update sub_categorias set nombre = "'.$this->nombre.'", categoria_id = '. $this->cat .' where id = '.$this->ids);
        }); 
        //$subcategoria->save();
    }

    public function desHab($id){
        $this->ids = $id;
        $this->activo = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->ids)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update sub_categorias set activo = '. 0 .' where id = '.$this->ids);
            }else{
                DB::update('update sub_categorias set activo = '. 1 .' where id = '.$this->ids);
            }
        });
    }

}
