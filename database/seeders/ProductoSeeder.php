<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['codigo' => '4170000',
             'nombre' => 'Emulsión Aveno Humectante Corporal x 250ml',
             'descripcion' => 'Libre de Parabenos. Libre de Sulfatos.No Crueldad Animal',
             'precio' => 24000, 
             'cantidad' => 10,
             'imagen' => 'public/img/4170000.jpg',
             'activo' => 1,
             'cod_marca' => 'AVN',
             'subcategoria_id' => 17,
             'categoria_id' => 4],
             ['codigo' => '4120000',
             'nombre' => 'Crema Hidratante Intensiva Nivea Soft para Todo Tipo de Piel x 100 ml',
             'descripcion' => ' ',
             'precio' => 3000, 
             'cantidad' => 10,
             'imagen' => 'public/img/4120000.webp',
             'activo' => 1,
             'cod_marca' => 'NIV',
             'subcategoria_id' => 12,
             'categoria_id' => 4],
             ['codigo' => '2060001',
             'nombre' => 'Labial líquido Max factor Lipfinity Velvet Matte x 3,5 ml',
             'descripcion' => 'Vegano. No testeado en animales.',
             'precio' => 22000, 
             'cantidad' => 10,
             'imagen' => 'public/img/2060001.webp',
             'activo' => 1,
             'cod_marca' => 'MXF',
             'subcategoria_id' => 6,
             'categoria_id' => 2],
             ['codigo' => '2040000',
             'nombre' => 'Lápiz de Ojos Rimmel Kind & Free x 1,1 g',
             'descripcion' => 'No testeado en animales.',
             'precio' => 13000, 
             'cantidad' => 10,
             'imagen' => 'public/img/2040000.webp',
             'activo' => 1,
             'cod_marca' => 'RMM',
             'subcategoria_id' => 4,
             'categoria_id' => 2],

             
        ];
        foreach($productos as $producto){
            Producto::create($producto);
        }
    }
}
