<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where('email', 'like', $request->email)->first();
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->flash('message.content', 'You will login!!!');
                $request->session()->flash('message.level', 'success');
                return redirect('admin');

            } else {
                $request->session()->flash('message.content', 'Not find this user!');
                $request->session()->flash('message.level', 'danger');
                return view('auth.login');
            }
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('auth.login');
    }
}
