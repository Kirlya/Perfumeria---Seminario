<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetalleCompra;

class DetalleCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detalles = [
            ['N_Linea' => 1, 'N_Factura' => 1, 'cantidad' => 1, 'precio_unit' => 23000, 'cod_prod' => 4170000],
            ['N_Linea' => 2, 'N_Factura' => 1, 'cantidad' => 3, 'precio_unit' => 3000, 'cod_prod' => 4120000],
            ['N_Linea' => 1, 'N_Factura' => 2, 'cantidad' => 1, 'precio_unit' => 14000, 'cod_prod' => 2050000],
            ['N_Linea' => 2, 'N_Factura' => 2, 'cantidad' => 1, 'precio_unit' => 30000, 'cod_prod' => 4130000],
            ['N_Linea' => 3, 'N_Factura' => 2, 'cantidad' => 2, 'precio_unit' => 13000, 'cod_prod' => 2040000],
            ['N_Linea' => 1, 'N_Factura' => 3, 'cantidad' => 4, 'precio_unit' => 3500, 'cod_prod' => 2070000],
            ['N_Linea' => 2, 'N_Factura' => 3, 'cantidad' => 1, 'precio_unit' => 20000, 'cod_prod' => 5160000],
            ['N_Linea' => 3, 'N_Factura' => 3, 'cantidad' => 1, 'precio_unit' => 22000, 'cod_prod' => 2060001],
            ['N_Linea' => 4, 'N_Factura' => 3, 'cantidad' => 1, 'precio_unit' => 13000, 'cod_prod' => 2040000],
            ['N_Linea' => 1, 'N_Factura' => 4, 'cantidad' => 2, 'precio_unit' => 36000, 'cod_prod' => 3080000],

        ];
        foreach($detalles as $detalle){
            DetalleCompra::create($detalle);
        }
    }
}
