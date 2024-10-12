<?php

namespace Database\Seeders;

use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategorias = [
            ['nombre' => 'Femenino',
            'categoria_id' => '1'],
            ['nombre' => 'Masculino',
            'categoria_id' => '1'],
            ['nombre' => 'Unisex',
            'categoria_id' => '1'],
            ['nombre' => 'Ojos',
            'categoria_id' => '2'],
            ['nombre' => 'Rostro',
            'categoria_id' => '2'],
            ['nombre' => 'Labios',
            'categoria_id' => '2'],
            ['nombre' => 'Uñas',
            'categoria_id' => '2'],
            ['nombre' => 'Shampoo',
            'categoria_id' => '3'],
            ['nombre' => 'Acondicionador',
            'categoria_id' => '3'],
            ['nombre' => 'Tinturas',
            'categoria_id' => '3'],
            ['nombre' => 'Tratamiento',
            'categoria_id' => '3'],
            ['nombre' => 'Cremas',
            'categoria_id' => '4'],
            ['nombre' => 'Protector Solar',
            'categoria_id' => '4'],
            ['nombre' => 'Jabones',
            'categoria_id' => '4'],
            ['nombre' => 'Pelo',
            'categoria_id' => '5'],
            ['nombre' => 'Otros',
            'categoria_id' => '5'],
            ];

            foreach($subcategorias as $subcategoria){
                Subcategoria::create($subcategoria);
            }
    }
}
