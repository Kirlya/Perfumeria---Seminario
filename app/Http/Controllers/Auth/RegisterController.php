<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;

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
            'email' => ['required', 'string', 'email', 'max:40', 'unique:usuarios'],
            'contraseña' => ['required', 'string', 'min:8', 'confirmed']]);
        

        $usuario = new Usuario();
        $usuario->nombre = $validardatos['nombre'];
        $usuario->apellido = $validardatos['apellido'];
        $usuario->email = $validardatos['email'];
        $usuario->telefono = $validardatos['telefono'];
        $usuario->contraseña = Hash::make($validardatos['contraseña']);
        $usuario->activo = true;
        $usuario->roles_id = 3;
    
        $usuario->assignRole('Usuario');

        $usuario->save();

        $data = array(
            'nombre' => $validardatos['nombre'],
            'email' => $validardatos['email'],
            'asunto' => 'Perfumeria: Creacion Usuario'
        );

        Mail::to($data['email'])->send(new SendMail($data));

        return view('login.login');
    }
}
