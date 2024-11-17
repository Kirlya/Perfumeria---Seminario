<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerFavoritos extends Component
{
    public $productos;
    public $vacio;
    public $codigo;

    public function mount(){
        $this->productos = DB::table('favoritos')->join('productos','favoritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->where('productos.activo',1)->select('productos.*')->get();
        if(empty($this->productos->toArray())){
            $this->vacio = true;
        }else{
            $this->vacio = false;
        }
    }

    public function eliminarFavorito($codigo){
        $this->codigo = $codigo;
        DB::transaction(function(){
            DB::table('favoritos')->where('usuario_id',Auth::id())->where('producto_id',$this->codigo)->delete();
        });
        $this->productos = DB::table('favoritos')->join('productos','favoritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->where('productos.activo',1)->select('productos.*')->get();
        //dd($this->productos);
        if(empty($this->productos->toArray())){
            $this->vacio = true;
        }else{
            $this->vacio = false;
        }
    }


    public function render()
    {
        return view('livewire.ver-favoritos');
    }
}
