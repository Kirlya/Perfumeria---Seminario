<?php

namespace App\Http\Controllers;

use App\Models\ofertas;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ofertas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ofertas = new Ofertas();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ofertas $ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ofertas $ofertas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ofertas $ofertas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ofertas $ofertas)
    {
        //
    }
}
