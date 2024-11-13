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


    public $codigo;
    public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
    public $activo;
    public $cantidad;
    public $marcap;
    public $subcategory;
    public $subcategoria_id;
    public $categoria_id;
    public $category;

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

    public function editsubc($codigo){
        $this->codigo = $codigo;
        $producto = DB::table('productos')->where('productos.codigo','=',$this->codigo)->get();
        
        $this->nombre = $producto[0]->nombre;
        $this->descripcion = $producto[0]->descripcion;
        $this->precio = $producto[0]->precio;
        $this->cantidad = $producto[0]->cantidad;
        $this->marcap = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->where('productos.codigo','=',$this->codigo)->value('marcas.nombre');
        $this->subcategory = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.codigo','=',$this->codigo)->value('sub_categorias.nombre');
    }

    public function update()
    {
        //dd($this->imagen->getClientOriginalName());
        if($this->imagen){
            //problema con store
            $this->imagen->store('public/img');
        }
            
        
        $this->subcategoria_id = DB::table('sub_categorias')->where('sub_categorias.nombre','=',$this->subcategory)->value('id');
        $this->categoria_id = DB::table('sub_categorias')->where('sub_categorias.id','=',$this->subcategoria_id)->value('categoria_id');
        DB::transaction(function () {
            DB::update('update productos set nombre = "'.$this->nombre.'", descripcion = "'.$this->descripcion.'", precio = '.$this->precio.', imagen = "public/img/'.$this->imagen->getClientOriginalName().'", subcategoria_id = '. $this->subcategoria_id .', categoria_id = '.$this->categoria_id.' where codigo = '.$this->codigo);
        }); 
    }

    public function desHab($codigo){
        $this->codigo = $codigo;
        $this->activo = DB::table('productos')->where('productos.codigo','=',$this->codigo)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update productos set activo = '. 0 .' where codigo = '.$this->codigo);
            }else{
                DB::update('update productos set activo = '. 1 .' where codigo = '.$this->codigo);
            }
        });
    }
}
