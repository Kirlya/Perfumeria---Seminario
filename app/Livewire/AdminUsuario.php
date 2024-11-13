<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminUsuario extends Component
{
    public $correo;
    public $role;
    public $rol_id;
    public $nombre;
    public $apellido;

    public function render()
    {
        return view('livewire.admin-usuario');
    }

    public function editarusu($correo){
        $this->correo = $correo;
        $this->nombre = DB::table('usuarios')->where('usuarios.email','=',$this->correo)->value('nombre');
        $this->apellido = DB::table('usuarios')->where('usuarios.email','=',$this->correo)->value('apellido');
        $this->role = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->where('usuarios.email','=',$this->correo)->value('roles.name');
    }

    public function update(){
        $this->rol_id = DB::table('roles')->where('roles.name','=',$this->role)->value('id');
        DB::transaction(function(){
            DB::update('update usuarios set roles_id = '.$this->rol_id.' where email = '.json_encode($this->correo));
        });
    }

    public function desHab($correo){
        $this->correo = $correo;
        $this->activo = DB::table('usuarios')->where('usuarios.email','=',$this->correo)->value('activo');
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update usuarios set activo = '. 0 .' where email = '.json_encode($this->correo));
            }else{
                DB::update('update usuarios set activo = '. 1 .' where email = '.json_encode($this->correo));
            }
        });
    }
}
