<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Perfumes', 'activo' => 1],
            ['nombre' => 'Maquillaje', 'activo' => 1],
            ['nombre' => 'Cuidado Capilar', 'activo' => 1],
            ['nombre' => 'Cuidado Piel', 'activo' => 1],
            ['nombre' => 'Accesorios', 'activo' => 1]
        ];

        foreach($categorias as $categoria){
            Categoria::create($categoria);
        }
    }
}
