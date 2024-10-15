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
            'ver-ventas'
        ]);

        $operador->givePermissionTo([
            'editar-producto','editar-categoria','editar-etiqueta','editar-subcategoria',
        ]);

        $usuario->givePermissionTo([
            'ver-producto','realizar-compra','ver-usuario','editar-datos-usuario'
        ]);

        $visitante->givePermissionTo([
            'ver-producto'
        ]);

    }
}
