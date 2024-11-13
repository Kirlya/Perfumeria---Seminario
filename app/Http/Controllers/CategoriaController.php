<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('permission:ver-categorias',['only' => ['index'] ]);
        $this->middleware('permission:crear-categoria', ['only' => ['create','store']]);
        $this->middleware('permission:editar-categoria', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-categoria', ['only' => ['destroy']]);
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categoria');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('admin.crear-categoria',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->get('nombre');
        $categoria->activo = 1;
        $categoria->save();

        return redirect()->route('admin-categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        
        $categoria->nombre = $request->get('nombre');
        $categoria->update();
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //No
    }
}
