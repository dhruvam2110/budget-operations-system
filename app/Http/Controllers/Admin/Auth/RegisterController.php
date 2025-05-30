<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Admin
     */

    //Employee Registration
    public function create(Request $request) {

        $save = new Admin;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->save();

        Auth::guard('admin')->login($save);
        return redirect(route('admin.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Registered successfully!',
                'message' => 'Registered and logged in successfully.',
            ],
        ]);
    }

    //Email Remote Function
    public function employeeEmailExist(Request $request) {

        $emp = Admin::where('email', $request->email)->first();

        if($emp != NULL){
            echo 'false';
        } else {
            echo 'true';
        }
    }
}
