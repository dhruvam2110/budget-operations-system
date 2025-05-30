<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin-panel/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        //$this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {

        return view('admin.auth.login');
    }
    

    public function logout(Request $request) {

        $this->performLogout($request);
        return redirect(route('admin.login'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Logged out!',
                'message' => 'Successfully logged out.',
            ],
        ]);
    }

    public function signup() {

        return view('admin.auth.register');
    }

    //defining guard for admins
    protected function guard() {
        
        return Auth::guard('admin');
    }
}
