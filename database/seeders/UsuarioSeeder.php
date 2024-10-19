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
