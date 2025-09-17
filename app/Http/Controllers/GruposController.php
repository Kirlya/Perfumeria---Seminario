<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:ver-etiquetas',['only' => ['index'] ]);
        $this->middleware('permission:crear-etiqueta', ['only' => ['create','store']]);
        $this->middleware('permission:editar-etiqueta', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-etiqueta', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('grupos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupo = new Grupo();
        return view('admin.crear-grupo',compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nombre = $request->get('nombre');
        $grupo->save();

        return redirect()->route('admin-grupos');
    }

    /**
     * Display the specified resource.
     */
    public function show(grupos $grupos)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grupos $grupos)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grupos $grupos)
    {
        $grupo->nombre = $request->get('nombre');
        $grupo->update();

        return redirect()->route('admin-grupos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grupos $grupos)
    {
        //
    }
}
