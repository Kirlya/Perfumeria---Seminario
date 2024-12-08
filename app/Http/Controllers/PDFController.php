<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:ver-ventas',['only' => ['crearPDF']]);
    }


    public function crearPDF($mes,$año){
        $data = [
            'title' => 'Ventas',
            'ventas' => DB::table('compras')->join('detalle_compras','compras.N_Factura','detalle_compras.N_Factura')->whereMonth('fecha',$mes)->whereYear('fecha',$año)->get(),
            'facturas' => DB::table('compras')->whereMonth('fecha',$mes)->whereYear('fecha',$año)->get(),
            'producto' => DB::table('detalle_compras')->join('compras','detalle_compras.N_Factura','=','compras.N_Factura')->join('productos','productos.codigo','=','detalle_compras.cod_prod')
            ->select('cod_prod','productos.nombre', DB::raw('SUM(detalle_compras.cantidad) as total_cantidad'))
            ->whereMonth('fecha', $mes)
            ->whereYear('fecha', $año)
            ->groupBy('cod_prod','productos.nombre')
            ->orderByDesc(DB::raw('SUM(detalle_compras.cantidad)'))  // Orders by the sum of cantidad in descending order
            ->first(),
        ];
        $pdf = PDF::loadView('pdf.pdf', $data);
        return $pdf->stream();
    }
}
