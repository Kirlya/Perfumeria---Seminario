<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function porSubCategoria($subcategoria){
        $productos = DB::table('productos')->where('subcategoria_id','=',$subcategoria->id);
        return view('categoria.lista_productos_subcategoria',compact('subcategoria'));
    }

    //preguntar 
    public function search($nombre){
        $producto = DB::table('productos')->where('productos.nombre','like','%'.$nombre.'%');
        //queda en proceso
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        $categoria = Categoria::get();
        return view('producto.create',compact('producto','categoria'));
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
        $producto->marca_id = $request->get('marca_id');
        $producto->categoria_id = $request->get('categoria_id');
        if($request->hasFile('imagen')){
            $img_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public','storage',$img_url));
        }else{
            $producto->imagen = '';
        }
        $producto->save();
        return redirect()->route('producto.index');
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
            $img_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public','storage',$img_url));
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
}
