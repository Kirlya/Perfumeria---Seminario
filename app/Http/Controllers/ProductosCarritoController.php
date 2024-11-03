<?php

namespace App\Http\Controllers;

use App\Models\ProductosCarrito;
use Illuminate\Http\Request;

class ProductosCarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carrito.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    //para agregar necesito codigo producto para eliminar tambien para vaciar solo usuario_id 
    //functiones agregar, eliminar, vaciar, concretar compra

    public function create()
    {
        //
    }
    //mas posible codigo en js
    public function agregarProducto(array $array){
        $producto = Producto::find($array['producto_id']);
        $usuario = Usuario::find($array['usuario_id']);
        $productoCarrito = new ProductoCarrito();
        $productoCarrito->producto_id = $producto;
        $productoCarrito->usuario_id = $usuario;
        $productoCarrito->cantidad = $array['cantidad'];
        $productoCarrito->precio = $array['precio'];
        $productoCarrito->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function comprar(){
        return view('pagos.index');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductosCarrito $productosCarrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductosCarrito $productosCarrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductosCarrito $productosCarrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductosCarrito $productosCarrito)
    {
        //
    }
}
