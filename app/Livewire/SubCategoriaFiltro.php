<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubCategoriaFiltro extends Component
{
    public $subcategoria;
    public $categoria;
    public $productos;
    public $marcas = [];
    public $busqueda= '';
    public $favoritos = [];
    public $selected;
    public $pos;
    public $minv;
    public $maxv;

    public function mount($categoria,$subcategoria)
    {
        $this->subcategoria = $subcategoria;
        $this->categoria = $categoria;
        $this->selected = 0;
        if(Auth::user()){
            $this->favoritos = DB::table('favoritos')->where('usuario_id',Auth::id())->select('producto_id')->get();
            $this->favoritos = array_column($this->favoritos->toArray(),'producto_id');

            //$this->favoritos = $this->favoritos->toArray();
            
            //dd($this->favoritos);
        }
        
        $this->productos = Producto::where('subcategoria_id',$subcategoria)->where('activo',1)->get();
        $this->maxv = DB::table('productos')->where('subcategoria_id',$subcategoria)->max('precio');
        $this->minv = "0";
    }

    public function render()
    {
        return view('livewire.sub-categoria-filtro');
    }

    public function agregarMarca($marca){
        //pos array_search('valor',$array)
        //unset(array[pos]);
        //falla this->pos
        $this->pos = array_search($marca,$this->marcas);
        if(in_array($marca,$this->marcas)){
            unset($this->marcas[$this->pos]);
        }else{
            array_push($this->marcas,$marca);
        }
        $this->actualizarLista();
    }

    public function agregarFavorito($producto){
        $this->selected = $producto;
        if(in_array($this->selected,$this->favoritos)){
            unset($this->favoritos[array_search($this->selected,$this->favoritos)]);
            DB::transaction(function(){   
                DB::table('favoritos')->where('producto_id',$this->selected)->where('usuario_id',Auth::id())->delete();
            });
             
            //insert in table favoritos
        }else{
            array_push($this->favoritos,$this->selected);
            DB::transaction(function(){
                DB::table('favoritos')->insert(['producto_id' => $this->selected, 'usuario_id' => Auth::id()]);
            });
            //delete from table favoritos
        }
    }

    public function actualizarLista(){
            $this->productos = Producto::where('subcategoria_id',$this->subcategoria)->get();
            if(!empty($this->marcas))
                $this->productos = $this->productos->whereIn('cod_marca',$this->marcas);
            //$this->productos = $this->productos->where('precio','>=',$this->min)->where('precio','<=',$this->max);
        
    }

}
