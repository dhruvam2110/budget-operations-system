<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;
use Illuminate\Support\Facades\Config;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    protected $token;

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm($token) {

        return view('admin.auth.passwords.reset', compact('token'));
    }

    public function reset(Request $request) {
        
        $user = Admin::where('token', $request->token)->first();
        $user->password = Hash::make($request->newpassword);
        $user->save();
        Auth::guard('admin')->login($user);
        return redirect(route('admin.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Password reset!',
                'message' => 'Password reset successfully.',
            ],
        ]);
    }
}
