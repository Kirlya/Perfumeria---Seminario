<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('marca.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marca = new Marca();
        return view('marca.create',compact('marca'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marca = new Marca();
        $marca->nombre = $request->get('nombre');
        $marca->save();
        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return view('marca.index',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->nombre = $request->get('nombre');
        $marca->update();
        return redirect()->route('marca.index')->with('alert','Marca actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //Probablemente no deberia estar esto
        $marca->delete();
        return redirect()->route('marca.index')->with('alert','Marca eliminada');
    }
}
