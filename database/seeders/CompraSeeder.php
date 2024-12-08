<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\compra;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compras = [
            [ 'N_Factura' => 1, 'fecha' => '24-10-01', 'total' => 30000 , 'usuario' => 3, 'metodoPago' => 1, 'estadoPago' => 2],
            [ 'N_Factura' => 2, 'fecha' => '24-10-07', 'total' => 70000 , 'usuario' => 4, 'metodoPago' => 1, 'estadoPago' => 2],
            [ 'N_Factura' => 3, 'fecha' => '24-10-08', 'total' => 69000 , 'usuario' => 4, 'metodoPago' => 1, 'estadoPago' => 2],
            [ 'N_Factura' => 4, 'fecha' => '24-11-04', 'total' => 72000 , 'usuario' => 6, 'metodoPago' => 1, 'estadoPago' => 2],
            ];
        
        foreach($compras as $compra){
            compra::create($compra);
        }
            
    }
}
