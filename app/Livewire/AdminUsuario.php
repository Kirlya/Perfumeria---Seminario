<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUsuario extends Component
{
    public $correo;
    public $role;
    public $rol_id;
    public $nombre;
    public $apellido;

    public $my;
    public $rol;
    
    public $usuario;
    public $usuarios;
    public $columna;
    public $index;
    public $order;

    public function mount(){
        $this->order = 0;
        $this->usuarios = DB::table('usuarios')->get();
    }

    public function render()
    {
        //dd(Role::find(Usuario::find(Auth::id())->roles_id));
        return view('livewire.admin-usuario');
    }

    public function ordenarPorEmail(){
        if($this->order){
            $this->order = 0;
            $this->usuarios = DB::table('usuarios')->orderBy('email','desc')->get();
        }else{
            $this->order = 1;
            $this->usuarios = DB::table('usuarios')->orderBy('email')->get();
        }
    }

    public function ordenarPorApellido(){
        if($this->order){
            $this->order = 0;
            $this->usuarios = DB::table('usuarios')->orderBy('apellido','desc')->get();
        }else{
            $this->order = 1;
            $this->usuarios = DB::table('usuarios')->orderBy('apellido')->get();
        }
    }

    public function ordenarPorActivo(){
        if($this->order){
            $this->order = 0;
            $this->usuarios = DB::table('usuarios')->orderBy('activo','desc')->get();
        }else{
            $this->order = 1;
            $this->usuarios = DB::table('usuarios')->orderBy('activo')->get();
        }
    }

    public function ordenarPorRol(){
        if($this->order){
            $this->order = 0;
            $this->usuarios = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->orderBy('roles.name','desc')->select('usuarios.*')->get();
        }else{
            $this->order = 1;
            $this->usuarios = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->orderBy('roles.name')->select('usuarios.*')->get();
        }
    }

    public function editarusu($correo){
        $this->correo = $correo;
        $this->columna = array_column($this->usuarios->toArray(),'email');
        $this->index = array_search($correo,$this->columna);
        $this->nombre = $this->usuarios[$this->index]->nombre;
        $this->apellido = $this->usuarios[$this->index]->apellido;
        $this->role = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->where('usuarios.email','=',$this->correo)->value('roles.name');
        
       

        //$this->my = Usuario::find(Auth::id())->getPermissionsViaRoles();
        //dd($this->my);
    }

    public function update(){
        $this->rol_id = DB::table('roles')->where('roles.name','=',$this->role)->value('id');
        DB::transaction(function(){
            DB::update('update usuarios set roles_id = '.$this->rol_id.' where email = '.json_encode($this->correo));
        });
        $this->usuario = Usuario::find($this->usuarios[$this->index]->id);
        $this->usuario->syncRoles([$this->role]);
        $this->rol = Role::findByName($this->role);
        $this->usuario->syncPermissions($this->rol->permissions);
    }

    public function desHab($correo){
        $this->correo = $correo;
        $this->columna = array_column($this->usuarios->toArray(),'email');
        $this->index = array_search($correo,$this->columna);
        $this->activo = $this->usuarios[$this->index]->activo;
        DB::transaction(function (){
            if($this->activo) {
                DB::update('update usuarios set activo = '. 0 .' where email = '.json_encode($this->correo));
            }else{
                DB::update('update usuarios set activo = '. 1 .' where email = '.json_encode($this->correo));
            }
        });
        if($this->activo){
            $this->activo = 0;
        }else{
            $this->activo = 1;
        }
        $this->usuarios[$this->index]->activo = $this->activo;
    }
}
