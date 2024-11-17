<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads; 

class AdminProducto extends Component
{

    use WithFileUploads;

    public $productos;
    public $orden;
    public $columna;
    public $index;

    public $codigo;
    public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
    public $activo;
    public $cantidad;
    public $marcap;
    public $marca_id;
    public $subcategory;
    public $subcategoria_id;

    public function mount(){
        $this->orden_nombre = 0;
        $this->productos = DB::table('productos')->get();
    }

    public function ordenarPorNombre(){
        
        if($this->orden){
            $this->orden = 0;
            $this->productos = DB::table('productos')->orderBy('nombre','desc')->get();
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->orderBy('nombre')->get();
        }
        
    }

    public function ordenarPorCodigo(){
        if($this->orden){
            $this->orden = 0;
            $this->productos = DB::table('productos')->orderBy('codigo','desc')->get();
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->orderBy('codigo')->get();
        }
    }

    public function ordenarPorPrecio(){
        if($this->orden){
            $this->orden = 0;
            $this->productos = DB::table('productos')->orderBy('precio','desc')->get();
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->orderBy('precio')->get();
        }
    }

    public function ordenarPorCantidad(){
        if($this->orden){
            $this->orden = 0;
            $this->productos = DB::table('productos')->orderBy('cantidad','desc')->get();
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->orderBy('cantidad')->get();
        }
    }

    public function ordenarPorActivo(){
        if($this->orden){
            $this->orden = 0;
            $this->productos = DB::table('productos')->orderBy('activo','desc')->get();
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->orderBy('activo')->get();
        }
    }

    public function ordenarPorMarca(){
        if($this->orden){
            $this->productos = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->orderBy('marcas.nombre','desc')->select('productos.*')->get();
            $this->orden = 0;
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->orderBy('marcas.nombre')->select('productos.*')->get();
        }
    }

    public function ordenarPorSubCategoria(){
        if($this->orden){
            $this->productos = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->orderBy('sub_categorias.nombre','desc')->select('productos.*')->get();
            $this->orden = 0;
        }else{
            $this->orden = 1;
            $this->productos = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->orderBy('sub_categorias.nombre')->select('productos.*')->get();
        }
    }

    public function render()
    {
        return view('livewire.admin-producto');
    }

    public function edit($codigo){
        $this->codigo = $codigo;
        $this->columna = array_column($this->productos->toArray(),'codigo');
        $this->index = array_search($codigo,$this->columna);
        $this->nombre = $this->productos[$this->index]->nombre;
        $this->descripcion = $this->productos[$this->index]->descripcion;
        $this->precio = $this->productos[$this->index]->precio;
        $this->cantidad = $this->productos[$this->index]->cantidad;
        $this->marcap = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->where('productos.codigo','=',$this->codigo)->value('marcas.nombre');
        $this->subcategory = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.codigo','=',$this->codigo)->value('sub_categorias.nombre');
    }

    public function update()
    {
        $this->subcategoria_id = DB::table('sub_categorias')->where('sub_categorias.nombre','=',$this->subcategory)->value('id');
        $this->marca_id = DB::table('marcas')->where('marcas.nombre','=',$this->marcap)->value('codigo');
        //dd($this->imagen->getClientOriginalName());
        if($this->imagen){
            //problema con store
            DB::transaction(function () {
                DB::update('update productos set nombre = "'.$this->nombre.'", descripcion = "'.$this->descripcion.'", precio = '.$this->precio.', cod_marca = "'.$this->marca_id.'", imagen = "public/img/'.$this->imagen->getClientOriginalName().'", subcategoria_id = '. $this->subcategoria_id .' where codigo = '.$this->codigo);
            }); 
            $this->productos[$this->index]->imagen = "public/img/".$this->imagen->getClientOriginalName();
        }
            
        $this->productos[$this->index]->nombre = $this->nombre;
        $this->productos[$this->index]->descripcion = $this->descripcion;
        $this->productos[$this->index]->cantidad = $this->cantidad;
        $this->productos[$this->index]->precio = $this->precio;
        
        DB::transaction(function () {
            DB::update('update productos set nombre = "'.$this->nombre.'", descripcion = "'.$this->descripcion.'", precio = '.$this->precio.', cod_marca = "'.$this->marca_id.'", subcategoria_id = '. $this->subcategoria_id .' where codigo = '.$this->codigo);
        }); 
    }

    public function desHab($codigo){
        $this->codigo = $codigo;
        $this->columna = array_column($this->productos->toArray(),'codigo');
        $this->index = array_search($codigo,$this->columna);
        $this->activo = DB::table('productos')->where('codigo','=',$this->codigo)->value('activo');
        //dd($this->activo);
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }
        DB::transaction(function (){
                DB::update('update productos set activo = '. $this->activo .' where codigo = '.$this->codigo);
        });

        
        $this->productos[$this->index]->activo = $this->activo;
    }
}
