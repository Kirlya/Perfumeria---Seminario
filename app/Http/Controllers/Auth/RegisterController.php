<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index(){
        return view('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:30'],
            'apellido' => ['required','string','max:30'],
            'telefono' => ['required','string','max:20'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:usuarios'],
            'contraseña' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    /*
    protected function create(array $data)
    {
        return UsuarioController::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'contraseña' => Hash::make($data['contraseña']),
            'activo' => true,
        ]);
    } */

    public function create(Request $request)
    {
        $validardatos = $request->validate(['nombre' => ['required', 'string', 'max:30'],
            'apellido' => ['required','string','max:30'],
            'telefono' => ['required','string','max:20'],
            'dni' => ['required','max:8'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:usuarios'],
            'contraseña' => ['required', 'string', 'min:8', 'confirmed']]);

        $usuario = new Usuario();
        $usuario->nombre = $validardatos['nombre'];
        $usuario->apellido = $validardatos['apellido'];
        $usuario->dni = $validardatos['dni'];
        $usuario->email = $validardatos['email'];
        $usuario->telefono = $validardatos['telefono'];
        $usuario->contraseña = Hash::make($validardatos['contraseña']);
        $usuario->activo = true;
        if($request->exists('roles_id')){
            $usuario->roles_id = $request['roles_id'];
        }else{
            $usuario->roles_id = 3;
        }

        /* model_has_roles esto debe estar en el seeder una vez
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
        }*/

        $usuario->save();
        //$data contiene la informacion que se enviara en el correo
        $data = array(
            'nombre' => $validardatos['nombre'],
            'email' => $validardatos['email'],
            'asunto' => 'Perfumeria: Creacion Usuario'
        );

        
        if(!Auth::check()){
            
            Mail::to($data['email'])->send(new SendMail($data));   
        }

        //Mail::to($data['email'])->send(new SendMail($data));
        return redirect()->route('login');

    }
}
