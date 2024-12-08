<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\metodoPago;

class metodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodos = [
            ['nombre' => 'Debito'],
            ['nombre' => 'Credito']
        ];

        foreach($metodos as $metodo){
            metodoPago::create($metodo);
        }
    }
}
