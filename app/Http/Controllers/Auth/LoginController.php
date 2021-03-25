<?php

namespace App\Http\Controllers\Auth;

use App\Dinas;
use App\Http\Controllers\Controller;
use App\Penguji;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function loginp()
    {
        return view('penguji.login');
    }
    public function loginpost(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $data = Penguji::where('email', $email)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('email', $data->email);
                Session::put('id', $data->id);

                Session::put('name', $data->name);
                Session::put('login', TRUE);
                Session::put('login', TRUE);
                return redirect(route('home.penguji'));
            } else {
                return redirect(route('login.penguji'))->with('alert', 'Password atau Email, Salah !');
            }
        } else {
            return redirect(route('login.penguji'))->with('alert', 'Password atau Email, Salah!');
        }
    }

    public function logout()
    {
        session()->forget('loginp');
        session()->flush();
        return redirect(route('login.penguji'));
    }

    public function Logind()
    {
        return view('dinas.login');
    }

    public function logindpost(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $data = Dinas::where('email', $email)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('email', $data->email);
                Session::put('id', $data->id);

                Session::put('name', $data->name);
                Session::put('login', TRUE);
                Session::put('login', TRUE);
                return redirect(route('home.dinas'));
            } else {
                return redirect(route('login.dinas'))->with('alert', 'Password atau Email, Salah !');
            }
        } else {
            return redirect(route('login.dinas'))->with('alert', 'Password atau Email, Salah!');
        }
    }
}
