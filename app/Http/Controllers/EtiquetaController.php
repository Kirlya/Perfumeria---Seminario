<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
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
        return view('admin.crear-etiqueta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->get('nombre');
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
