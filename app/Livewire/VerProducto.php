<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerProducto extends Component
{
    public $producto;
    public $favorito;
    public $carrito;
    public $cantidad;
    public $cantidad_actual;
    

    public function mount($producto){
        $this->producto = $producto;
        $this->cantidad = 0;
        $this->favorito = DB::table('favoritos')->where('producto_id',$producto->codigo)->where('usuario_id',Auth::id())->value('producto_id');
        $this->carrito = DB::table('productos_carritos')->where('producto_id',$producto->codigo)->where('usuario_id',Auth::id())->value('producto_id');
        $this->cantidad_actual = DB::table('productos_carritos')->where('producto_id',$producto->codigo)->where('usuario_id',Auth::id())->value('cantidad');
        if($this->cantidad_actual == null){
            $this->cantidad_actual = 0;
        }
    }

    public function render()
    {
        return view('livewire.ver-producto');
    }

    public function comprar(){
        $token = Str::random(20);
        return redirect()->route('comprar',['token' => $token]);
    }

    public function agregarFavorito(){
        if($this->favorito == $this->producto->codigo){
            DB::transaction(function(){
                DB::table('favoritos')->where('producto_id',$this->producto->codigo)->where('usuario_id',Auth::id())->delete();
            });
        }else{
            DB::transaction(function(){
                DB::table('favoritos')->insert(['producto_id' => $this->producto->codigo, 'usuario_id' => Auth::id()]);
            });
        }      
        $this->favorito = DB::table('favoritos')->where('producto_id',$this->producto->codigo)->where('usuario_id',Auth::id())->value('producto_id');
    }

    public function agregarCarrito(){
        //si ya existe el producto en el carrito y si se ha seleccionado comprar al menos 1 producto
        //dd($this->producto->codigo == $this->carrito && $this->cantidad > 0);
        if($this->producto->codigo == $this->carrito){
            if($this->cantidad > 0){
                $this->cantidad_actual = $this->cantidad_actual + $this->cantidad;
                //dd($this->cantidad_actual);
                DB::transaction(function(){
                    DB::table('productos_carritos')->where('producto_id',$this->producto->codigo)->where('usuario_id',Auth::id())->update(['cantidad' => $this->cantidad_actual, 'precio' => $this->cantidad_actual * $this->producto->precio]);
                });
                $this->cantidad = 0;
            }
           
        }else{
            if($this->cantidad > 0){
                $this->cantidad_actual = $this->cantidad_actual + $this->cantidad;
            DB::transaction(function(){
                DB::table('productos_carritos')->where('productos_id',$this->producto->codigo)->where('usuario_id',Auth::id())->insert(['producto_id' => $this->producto->codigo, 'usuario_id' => Auth::id(), 'cantidad' => $this->cantidad_actual, 'precio' => $this->cantidad_actual * $this->producto->precio]);
            });
            $this->cantidad = 0;
            }
            
            }
    }

}
