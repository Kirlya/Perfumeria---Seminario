<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login()
    {
        return view('login.login');
    }

    
    public function verificarlogin(Request $request)
    {

        $usuario = DB::table('usuarios')->where('email','=',$request->get('email'))->first();
        
        
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Hash::check($request->get('password'), $usuario->contraseña)){
            if($usuario->activo){
                $user = Usuario::find($usuario->email);
                //Aqui falla Argument #1 ($user) must be of type Illuminate\Contracts\Auth\Authenticatable,
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/');
            }
            
        }else{
            
            return back()->withErrors([
                'email' => 'Error en login',
            ])->onlyInput('email');
        }
    }
    /*

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
    }*/


    protected function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
