<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class VerProductosController extends Controller
{
    //
    public function porSub($subcategoria){

    }
    //$categoria es un string
    public function porCategoria(Categoria $categoria){
        //A modificar falta agregar tabla subcategoria
        $productos = DB::table('productos')
                    ->join('sub_categorias','sub_categorias.id','=','productos.subcategoria_id')
                    ->join('categorias', function (JoinClause $join){
                        $join->on('sub_categorias.categoria_id','=','categorias.id')
                        ->where('categorias.id','=',$categoria->id);})
                        ->get();
        return view('productos.categoria',compact('categoria'));
    }

    public function porSubCategoria(string $cat,string $sub){
        $categoria = DB::table('categorias')->where('categorias.nombre','like',$cat)->value('id');
        $subcategoria = DB::table('sub_categorias')->where('sub_categorias.categoria_id','=',$categoria)->where('sub_categorias.nombre','like',$sub)->value('id');
        return view('productos.subcategoria',compact('categoria','subcategoria'));
    }

    public function show(Producto $producto)
    {     
        //Consultar a futuro porsi esta bien el direccionamiento
        return view('productos.show',compact('producto'));
    }
}
