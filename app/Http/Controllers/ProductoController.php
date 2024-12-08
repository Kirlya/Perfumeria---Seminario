<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $redirectTo = '/';

     
     public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('permission:ver-ventas',['only' => ['ventas']]);
        $this->middleware('permission:ver-producto',['only' => ['index']]);
        $this->middleware('permission:crear-producto|editar-producto|deshabilitar-producto', ['only' => ['menuProductos','menu']]);
        $this->middleware('permission:crear-producto', ['only' => ['create','store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-producto', ['only' => ['destroy']]);
    
     } 


    public function index()
    {
        // falta segun una categoria;
        $products = DB::table('productos')->get();

        return view('productos.index',compact('products'));
    }

    public function ventas(){
        return view('admin.venta');
    }

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

    /*
    public function porSubCategoria(string $cat,string $subcat){
        $subcategoria = DB::table('sub_categorias')->where('sub_categorias.id','=',$id)->get();
        $productos = DB::table('productos')->join('sub_categorias','sub_categorias.id','=','productos.subcategoria_id')->where('sub_categorias.id','=','productos.subcategoria_id')->where('sub_categorias.categoria_id','=',$subcategoria->categoria_id)->get();
        $categoria = DB::table('categorias')->where('categorias.id','=',$subcategoria->categoria_id)->value('nombre')->limit(1);
        
        return view('productos.subcategoria',compact('subcategoria','categoria','productos'));
       // return view('productos.subcategoria',compact('categoria','productos','subcategoria'));
    }
    */

    public function porSubCategoria(string $cat,string $sub){
        $categoria = DB::table('categorias')->where('categorias.nombre','like',$cat)->value('id');
        $subcategoria = DB::table('sub_categorias')->where('sub_categorias.categoria_id','=',$categoria)->where('sub_categorias.nombre','like',$sub)->value('id');
        return view('productos.subcategoria',compact('categoria','subcategoria'));
    }

    public function menu(){
        return view('admin.index');
    }


    //nope ya esta implementado livewire 
    public function search($nombre){
        $producto = DB::table('productos')->where('productos.nombre','like','%'.$nombre.'%')->get();
        //queda en proceso
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        return view('admin.crear-producto',compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $sub = DB::table('sub_categorias')->where('sub_categorias.nombre','=',$request->get('subcategoria'))->value('id');
        $producto->subcategoria_id = $sub;
        $cat = DB::table('sub_categorias')->where('sub_categorias.id','=',$sub)->value('categoria_id');
        $count = DB::table('productos')->where('productos.codigo','>=',$cat * 1000000 + $sub * 10000)->where('productos.codigo','<=',$cat * 1000000 + $sub * 10000 + 9999)->latest()->value('codigo');

        //$count = DB::table('productos')->where('productos.categoria_id','=',$cat)->where('productos.subcategoria_id','=',$sub)->count();
        if($count){
            $producto->codigo = $count+1;
        }
        else{
            $producto->codigo = $cat * 1000000 + $sub * 10000;
        }    
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->cantidad = $request->get('cantidad');
        

        $marca = DB::table('marcas')->where('marcas.nombre','=',$request->get('marca'))->value('codigo');

        $producto->activo = 1;

        $producto->cod_marca = $marca;

        
        /*
        if($request->get('imagen')){
            $path = 'public/img/';
            $img_url = $path . $request->get('imagen');
            $producto->imagen = $img_url;
        }else{
            $producto->imagen = 'No se encontro';
        }*/
        /*
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'public/img/';
            $name = $file->getClientOriginalName();
            $upload = $request->file('imagen')->move($destinationPath,$name);
            $producto->imagen = $destinationPath . $name;
        }else{
            $producto->imagen = 'No se encontro';
        }*/

        if($request->get('imagen')){
            $name = 'public/img/' . $request->get('imagen');
            $producto->imagen = $name;
        }

        $producto->save();
        return redirect()->route('admin-productos');


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        
        //Consultar a futuro porsi esta bien el direccionamiento
        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('admin.crear-producto',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $sub = DB::table('sub_categorias')->where('sub_categorias.nombre','=',$request->get('subcategoria'))->value('id');
        $cat = DB::table('sub_categorias')->where('sub_categorias.id','=',$sub)->value('categoria_id');
        $producto->subcategoria_id = $sub;
        //$count = DB::table('productos')->where('productos.categoria_id','=',$cat)->where('productos.subcategoria_id','=',$sub)->count();
        //mala idea modificar el codigo puede causar problemas
        //$producto->codigo = $cat * 1000000 + $sub * 10000 + $count;
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->cantidad = $request->get('cantidad');
        $producto->marca_id = $request->get('cod_marca');

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'public/img/';
            $name = $file->getClientOriginalName();
            $upload = $request->file('imagen')->move($destinationPath,$name);
            $producto->imagen = $destinationPath . $name;
        }else{
            $producto->imagen = 'No se encontro';
        }
        $producto->update();
        return redirect()->route('admin.producto')->with('alert','Producto "'.$producto->nombre.'"actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->activo = false;
        //$producto->delete();
        return redirect()->route('producto.index')
        ->with('alert' ,'Producto eliminado exitosamente.');
    }

    public function menuProductos(){
        return view('admin.producto');
    }
}
