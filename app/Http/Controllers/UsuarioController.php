<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        //mostrar datos de el usuario logeado
        return view ('index');
        //return view ('login.index',compact('user'));
    }


    public function login()
    {
        return view('login.login');
    }

    public function verificarlogin(Request $request)
    {
        $contraseña = DB::table('usuarios')->where('email','=',$request->get('email'))->value('contraseña');

        if($contraseña == $request->get('password')){
            return view('index');
        }
        else{
            return view('login.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validardatos = $request->validate(['nombre' => ['required', 'string', 'max:30'],
            'apellido' => ['required','string','max:30'],
            'telefono' => ['required','string','max:20'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:usuarios'],
            'contraseña' => ['required', 'string', 'min:8', 'confirmed']]);
        

        $usuario = new Usuario();
        $usuario->nombre = $validardatos['nombre'];
        $usuario->apellido = $validardatos['apellido'];
        $usuario->email = $validardatos['email'];
        $usuario->telefono = $validardatos['telefono'];
        $usuario->contraseña = $validardatos['contraseña'];
        $usuario->activo = true;
        $usuario->roles_id = 3;

        $usuario->save();
        return view('login.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // No
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        // ??
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->activo = false;
        return view('home');
    }
}
