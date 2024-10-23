<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $usuario = ['nombre' => 'Super',
            'apellido' => 'Admin',
            'telefono' => '1',
            'email' => 'kathiacaro9@gmail.com',
            'contraseña' => Hash::make('12345678'),
            'activo' => 1,
            'roles_id' => 1]
        ;
            
            Usuario::create($usuario)->assignRole('Administrador');*/

            $superAdmin = Usuario::create([
                'nombre' => 'Super',
                'apellido' => 'Admin',
                'telefono' => '1' ,
                'email' => 'kathiacaro9@gmail.com',
                'contraseña' => Hash::make('12345678'),
                'activo' => 1,
                'roles_id' => 1
            ]);
            $superAdmin->assignRole('Administrador');

            $operador = Usuario::create([
                'nombre' => 'Sr',
                'apellido' => 'Operario',
                'telefono' => '3871230142',
                'email' => 'operador@test.com',
                'contraseña' => Hash::make('12345678'),
                'activo' => 1,
                'roles_id' => 2
            ]);
            $operador->assignRole('Operador');


            $usuario = Usuario::create([
                'nombre' => 'Mr',
                'apellido' => 'Usuario',
                'telefono' => '3871234567',
                'email' => 'usuario@test.com',
                'contraseña' => Hash::make('12345678'),
                'activo' => 1,
                'roles_id' => 3
            ]);
            $usuario->assignRole('Usuario');

            //$usuario->assignRole('Administrador');
        /*
        DB::table('usuarios')->insert([
            'nombre' => 'Super',
            'apellido' => 'Admin',
            'telefono' => '1',
            'email' => 'kathiacaro9@gmail.com',
            'contraseña' => Hash::make('12345678'),
            'activo' => 1,
            'roles_id' => 1
        ]);*/


    }
}
