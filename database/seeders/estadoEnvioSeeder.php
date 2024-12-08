<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estadoEnvio;

class estadoEnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['nombre' => 'En Preparacion'],
            ['nombre' => 'En Curso'],
            ['nombre' => 'Enviado'],
            ['nombre' => 'Anulado']
        ];

        foreach($estados as $estado){
            estadoEnvio::create($estado);
        }
    }
}
