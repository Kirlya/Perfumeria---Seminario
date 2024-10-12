<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = DB::table('subcategorias')->get();

        return view('subcategorias.index',compact('subcategorias'));
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
        $subcategorias = new SubCategoria();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
