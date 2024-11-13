<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Revlon', 'codigo' => 'RVL' , 'activo' => 1],
            ['nombre' => 'Aveno', 'codigo' => 'AVN' , 'activo' => 1],
            ['nombre' => 'Nivea', 'codigo' => 'NIV' , 'activo' => 1],
            ['nombre' => 'Max Factor', 'codigo' => 'MXF' , 'activo' => 1],
            ['nombre' => 'Maybelline', 'codigo' => 'MBL' , 'activo' => 1],
            ['nombre' => 'Klorane', 'codigo' => 'KLN' , 'activo' => 1],
            ['nombre' => 'Vichy' , 'codigo' => 'VCH', 'activo' => 1],
            ['nombre' => 'Elvive' , 'codigo' => 'ELV', 'activo' => 1],
            ['nombre' => 'Tresemme' , 'codigo' => 'TSM', 'activo' => 1],
            ['nombre' => 'Extreme' , 'codigo' => 'EXT', 'activo' => 1],
            ['nombre' => 'Get The Look' , 'codigo' => 'GTL', 'activo' => 1],
            ['nombre' => 'Rimmel' , 'codigo' => 'RMM', 'activo' => 1],
            ['nombre' => 'Eucerin' , 'codigo' => 'EUC', 'activo' => 1],
            ['nombre' => 'Garnier' , 'codigo' => 'GRN', 'activo' => 1],
            ['nombre' => 'Calvin Klein', 'codigo' => 'CKN', 'activo' => 1],
            ['nombre' => 'Lancôme', 'codigo' => 'LCM', 'activo' => 1],
            ['nombre' => 'Giorgio Armani', 'codigo' => 'GGA' , 'activo' => 1],
        ];

        foreach($marcas as $marca){
            Marca::create($marca);
        }
    }
}
