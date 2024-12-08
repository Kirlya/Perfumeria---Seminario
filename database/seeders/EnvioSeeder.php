<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\envio;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $envios = [
            ['N_Factura' => 1, 'fecha_envio' => '24-10-03', 'estado_envio' => 3, 'costo_envio' => 6000 ,'calle' => 'Alvarado', 'numero' =>1200, 'ciudad' => 'salta', 'provincia' => 'salta', 'cp' => '4400'],
            ['N_Factura' => 2, 'fecha_envio' => '24-10-10', 'estado_envio' => 3, 'costo_envio' => 6000 ,'calle' => 'Jujuy', 'numero' => 347, 'departamento' => '1', 'piso' => '2' , 'ciudad' => 'salta', 'provincia' => 'salta', 'cp' => '4400'],
            ['N_Factura' => 3, 'fecha_envio' => '24-10-10', 'estado_envio' => 3, 'costo_envio' => 6000 ,'calle' => 'Jujuy', 'numero' => 347,'departamento' => '1', 'piso' => '2', 'ciudad' => 'salta', 'provincia' => 'salta', 'cp' => '4400'],
            ['N_Factura' => 4, 'fecha_envio' => '24-11-04', 'estado_envio' => 3, 'costo_envio' => 6500 ,'calle' => 'Jose Segui', 'numero' => 546, 'barrio' => 'Del Milagro', 'ciudad' => 'salta', 'provincia' => 'salta', 'cp' => '4400'],
        ];
        foreach($envios as $envio){
            envio::create($envio);
        }
    }
}
