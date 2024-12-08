<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estadoPago;

class estadoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['nombre' => 'Autorizado'],
            ['nombre' => 'Pagado'],
            ['nombre' => 'Anulado'],
        ];

        foreach($estados as $estado){
            estadoPago::create($estado);
        }
    }
}
