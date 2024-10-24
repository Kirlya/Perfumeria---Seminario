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
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|deshabilitar-producto', ['only' => ['index','show']]);
        $this->middleware('permission:crear-producto', ['only' => ['create','store','menu','menuProductos']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit','update','menu','menuProductos']]);
        $this->middleware('permission:deshabilitar-producto', ['only' => ['destroy','menu','menuProductos']]);
     }


    public function index()
    {
        // falta segun una categoria;
        $products = DB::table('productos')->get();

        return view('productos.index',compact('products'));
    }

    public function porCategoria($categoria){
        //A modificar falta agregar tabla subcategoria
        $productos = DB::table('productos')
                    ->join('subcategorias','subcategorias.id','=','productos.subcategoria_id')
                    ->join('categorias', function (JoinClause $join){
                        $join->on('subcategorias.categoria_id','=','categorias.id')
                        ->where('categorias.id','=',$categoria->id);})
                        ->get();
        return view('categoria.lista_productos_categoria',compact('categoria'));
    }

    public function menu(){
        return view('admin.index');
    }


    //preguntar 
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
        return view('admin.crear-producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->cantidad = $request->get('cantidad');
        

        $marca = DB::table('marcas')->where('marcas.nombre','=',$request->get('marca'))->value('id');

        $producto->activo = 1;

        $producto->marca_id = $marca;

        $sub = DB::table('sub_categorias')->where('sub_categorias.nombre','=',$request->get('subcategoria'))->value('id');
        $producto->subcategoria_id = $sub;
        /*
        if($request->get('imagen')){
            $path = 'public/img/';
            $img_url = $path . $request->get('imagen');
            $producto->imagen = $img_url;
        }else{
            $producto->imagen = 'No se encontro';
        }*/

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'public/img/';
            $name = time() . '-' . $file->getClientOriginalName();
            $upload = $request->file('imagen')->move($destinationPath,$name);
            $producto->imagen = $destinationPath . $name;
        }else{
            $producto->imagen = 'No se encontro';
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
        return view('producto.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::get();

        return view('product.edit',compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->cantidad = $request->get('cantidad');
        $producto->marca_id = $request->get('marca_id');
        $producto->categoria_id = $request->get('categoria_id');
        if($request->hasFile('imagen')){
            $path = 'public/img';
            $image = $request->file('imagen');
            $image_name = $image->getClientOriginalName();
            $img_url = $request->file('imagen')->store($path,$image_name);
            $producto->imagen = $img_url;
            //$producto->imagen = asset(str_replace('public','img',$img_url));
        }else{
            $producto->imagen = '';
        }
        $producto->update();
        return redirect()->route('producto.index')->with('alert','Producto "'.$producto->nombre.'"actualizado');
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
