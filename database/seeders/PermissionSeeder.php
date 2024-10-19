<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'crear-rol',
            'editar-rol',
            'deshabilitar-rol',
            'ver-usuario',
            'ver-usuarios',
            'crear-usuario',
            'editar-datos-usuario',
            'editar-usuario',
            'deshabilitar-usuario',
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'deshabilitar-producto',
            'crear-categoria',
            'editar-categoria',
            'deshabilitar-categoria',
            'crear-subcategoria',
            'editar-subcategoria',
            'deshabilitar-subcategoria',
            'crear-etiqueta',
            'editar-etiqueta',
            'deshabilitar-etiqueta',
            'realizar-compra',
            'ver-ventas',
            'crear-rol',
            'editar-rol',
            'deshabilitar-rol'
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
