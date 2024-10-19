<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:crear-usuario|editar-usuario|deshabilitar-usuario', ['only' => ['index','show']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:deshabilitar-usuario', ['only' => ['destroy']]);
    } 
    
    public function index()
    {
        //mostrar datos de el usuario logeado
        return view ('usuarios.index');
        //return view ('login.index',compact('user'));
    }


    public function login()
    {
        return view('login.login');
    }


    
    public function verificarlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'contraseña' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            dd(Auth::getLastAttempted());
            $request->session()->regenerate();
 
            return view('index');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    /*
    public function verificarlogin(Request $request)
    {
        $contraseña = DB::table('usuarios')->where('email','=',$request->get('email'))->value('contraseña');

        

        if(Hash::check($request->get('password'), $contraseña)){
            $request->session()->regenerate();
            return redirect('/');
        }
        else{
            echo 'fallo';
            return view('login.login');
        }
    }*/

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
        $usuario->contraseña = Hash::make($validardatos['contraseña']);
        $usuario->activo = true;
        if($request->exists('roles_id')){
            $usuario->roles_id = $request['roles_id'];
        }else{
            $usuario->roles_id = 3;
        }

        switch($usuario->roles_id){
            case 1:
                $usuario->assignRole('Administrador');
                break;
            case 2:
                $usuario->assignRole('Operador');
                break;
            case 3:
                $usuario->assignRole('Usuario');
                break;
        }

        $usuario->save();
        //$data contiene la informacion que se enviara en el correo
        $data = array(
            'nombre' => $validardatos['nombre'],
            'email' => $validardatos['email'],
            'asunto' => 'Perfumeria: Creacion Usuario'
        );

        Mail::to($data['email'])->send(new SendMail($data));

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
        return redirect()->route('usuario.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        if ($user->hasRole('Administrador')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $usuario,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $usuario->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Usuario $usuario): RedirectResponse
    {
        $input = $request->all();
 
        if(!empty($request->contraseña)){
            $input['contraseña'] = Hash::make($request->contraseña);
        }else{
            $input = $request->except('contraseña');
        }
        
        $usuario->update($input);

        $usuario->syncRoles($request->roles);

        return redirect()->back()
                ->withSuccess('User is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        if($usuario->hasRole('Administrador') || $usuario->id = auth()->user()->id){
            abort(403,'No tienes los permisos suficientes');
        }
        $usuario->syncRoles([]);
        $usuario->activo = false;
        return redirect()->route('usuario.index');
    }
}
