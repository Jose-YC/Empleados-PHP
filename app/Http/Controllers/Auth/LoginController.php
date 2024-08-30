<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    private $rules = [
        'usuemail' => 'required|string',
        'usucontra' => 'required|string',
    ];

    /**
     * Messages for validate login
     *
     * @var array
     */

    private $messages = [
        'usuemail.required' => 'El nombre de usuario es requerido',
        'usucontra.required' => 'La contraseña es requerida',
    ];

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //merino
    public function login(Request $request)
    {
        // dd($request->all());

        $this->validateLogin($request);

        $user = User::where('usuemail', $request->usuemail)->first();

        if ($user) {
            //hash es lo que usa
            
            if (password_verify($request->usucontra, $user->usucontra)) {
                Auth::login($user);
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect()->route('login')->withErrors(['usucontra' => 'La contraseña es incorrecta']);
            }
        } else {
            return redirect()->route('login')->withErrors(['usuemail' => 'El usuario no existe']);
        }
    }

    public Static function username()
    {

        return  Auth::user()->usunombre;
    }

    public function validateLogin(Request $request)
    {
        $request->validate($this->rules, $this->messages);
    }
}
