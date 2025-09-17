<?php

namespace App\Http\Controllers;

use App\Models\modelos;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
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
        return view('admin.modelos');
    }

    public function modeloProducto(){

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //dd(request()->hasFile('images'));
        
        $modelo = new modelos();
        $modelo->atr = $request->get('atributo');
        $modelo->valor = $request->get('valor');
        $modelo->cantidad = $request->get('cantidad');
        $modelo->producto_id = $request->get('producto');
       
        $modelo->activo = 1;

        if(request()->hasFile('images'))
            $modelo->addAllMediaFromRequest(['images'])
                ->each(function($fileAdder){
                    $fileAdder->preservingOriginal()->toMediaCollection('fotos');
                });

        
        //$modelo->fotos = $request->get('fotos');

        $modelo->save();
        return redirect()->route('admin-modelos');
    }

    /**
     * Display the specified resource.
     */
    public function show(modelos $modelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(modelos $modelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, modelos $modelo)
    {
        $modelo->nombre = $request->get('nombre');
        $modelo->atr = $request->get('atributo');
        $modelo->valor = $request->get('valor');
        $modelo->cantidad = $request->get('cantidad');
        $modelo->producto_id = $request->get('producto');
        
        //$modelo->activo = 1;
        //$modelo->fotos = $request->get('fotos');

        $modelo->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(modelos $modelo)
    {   
        /* 
            if($modelo->activo)
                $modelo->activo = 0;
            else
                $modelo->activo = 1;
        */
    
    }
}
