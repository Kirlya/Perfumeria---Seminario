<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriaController extends Controller
{

    public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('permission:ver-subcategorias',['only' => ['index'] ]);
        $this->middleware('permission:crear-subcategoria', ['only' => ['create','store']]);
        $this->middleware('permission:editar-subcategoria', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-subcategoria', ['only' => ['destroy']]);
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subcategoria');
    }

    public function porSubCategoria($subcategoria){
        $productos = DB::table('productos')->where('subcategoria_id','=',$subcategoria->id)->get();
        return view('categoria.lista_productos_subcategoria',compact('subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategoria = new SubCategoria();
       return view('admin.crear-subcategoria',compact('subcategoria'));     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategoria = new SubCategoria();
        $subcategoria->nombre = $request->get('nombre');
        $subcategoria->save();

        return redirect()->route('admin-subcategorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategoria $subCategoria)
    {
        //
    }
}
