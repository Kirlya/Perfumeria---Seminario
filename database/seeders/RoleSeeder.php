<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Administrador']);
        $operador = Role::create(['name' => 'Operador']);
        $usuario = Role::create(['name' => 'Usuario']);
        $visitante = Role::create(['name' => 'Visitante']);
        
        $admin->givePermissionTo([
            'crear-rol',
            'editar-rol',
            'deshabilitar-rol',
            'ver-usuarios',
            'crear-usuario',
            'editar-usuario',
            'deshabilitar-usuario',
            'ver-producto',
            'ver-productos',
            'crear-producto',
            'editar-producto',
            'deshabilitar-producto',
            'ver-categorias',
            'crear-categoria',
            'editar-categoria',
            'deshabilitar-categoria',
            'ver-subcategorias',
            'crear-subcategoria',
            'editar-subcategoria',
            'deshabilitar-subcategoria',
            'ver-etiquetas',
            'crear-etiqueta',
            'editar-etiqueta',
            'deshabilitar-etiqueta',
            'ver-ventas',
            'ver-marcas',
            'crear-marca',
            'editar-marca',
            'deshabilitar-marca',
        ]);

        $operador->givePermissionTo([
            'ver-productos','ver-producto','editar-producto','ver-categorias','editar-categoria','ver-etiquetas','editar-etiqueta','ver-subcategorias','editar-subcategoria', 'ver-ventas','ver-marcas'
        ]);

        $usuario->givePermissionTo([
            'ver-producto','realizar-compra','ver-usuario','editar-datos-usuario'
        ]);

        $visitante->givePermissionTo([
            'ver-producto'
        ]);

    }
}
