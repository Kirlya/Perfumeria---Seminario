<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use Illuminate\Support\Str;

class VerCarrito extends Component
{
    public $productos;
    public $codigo;
    public $total;
    public $vacio;
    public $cant;
    public $index;
    public $carrito;
    


    public function mount(){
        $this->productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
        $this->total = 0;
        $this->cant = 1;
        if(empty($this->productos->toArray())){
            $this->vacio = true;
        }else{
            $this->vacio = false;
        }
        //$productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
        //dd($productos);
    }
    public function codP($codigo){
        $this->codigo = $codigo;
        $this->index = array_search($this->codigo,array_column($this->productos->toArray(),'codigo'));
        //dd($this->index);
        //dd($this->productos);
    }

    public function render()
    {
        return view('livewire.ver-carrito');
    }

    public function editarCantidad(){
        
        DB::transaction(function(){
            DB::table('productos_carritos')->where('usuario_id',Auth::id())->where('producto_id',$this->codigo)->update(['cantidad' => $this->cant, 'precio' => $this->cant * $this->productos[$this->index]->precio]);
        });
        
        $this->productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
        
        
    }

    public function sacarCarrito($codigo){
        $this->codigo = $codigo;
        DB::transaction(function(){
            DB::table('productos_carritos')->where('usuario_id',Auth::id())->where('producto_id',$this->codigo)->delete();
        });
        $this->productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
        
    }

    public function vaciarCarrito(){
        
        DB::transaction(function(){
            DB::table('productos_carritos')->where('usuario_id',Auth::id())->delete();
        });
        $this->productos = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','=','productos.codigo')->where('usuario_id',Auth::id())->select('productos.*')->get();
        if(empty($this->productos->toArray())){
            $this->vacio = true;
        }else{
            $this->vacio = false;
        }
    }

    public function completarCompra(){
        $this->carrito = DB::table('productos_carritos')->where('usuario_id',Auth::id())->get();
        foreach($this->carrito as $producto){
           $cantidad = DB::table('productos')->where('codigo',$producto->producto_id)->first();
           if($cantidad->cantidad < $producto->cantidad){
               return redirect()->route('carrito')->with('message','El producto '.$cantidad->nombre.' no tiene productos suficientes, cantidad disponible '.$cantidad->cantidad);
           }
           $token = Str::random(20);
           return redirect()->route('comprar',['token' => $token]);
        }

        //Corroborar que todos los productos tengan stock
    }
}
