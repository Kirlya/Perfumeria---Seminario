<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{

    public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('permission:ver-etiquetas',['only' => ['index'] ]);
        $this->middleware('permission:crear-etiqueta', ['only' => ['create','store']]);
        $this->middleware('permission:editar-etiqueta', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-etiqueta', ['only' => ['destroy']]);
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.etiqueta');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etiqueta = new Etiqueta();
        return view('admin.crear-etiqueta',compact('etiqueta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->get('nombre');
        $etiqueta->activo = 1;
        $etiqueta->save();

        return redirect()->route('admin-etiquetas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiqueta $etiqueta)
    {
        return view('etiqueta.show',compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiqueta $etiqueta)
    {
        return view('etiqueta.edit',compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $etiqueta->nombre = $request->get('nombre');
        $etiqueta->update();

        return redirect()->route('admin-etiquetas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiqueta $etiqueta)
    {
        //No
    }
}
