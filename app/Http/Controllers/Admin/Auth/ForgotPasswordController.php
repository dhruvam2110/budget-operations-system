<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Mail\ResetPassword;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    protected $token;

    public function showLinkRequestForm(){            
        return view('admin.auth.passwords.email');
    }

    public function broker(){
        return Password::broker('admins');
    }

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = Admin::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('messages', [
                [
                    'type' => 'error',
                    'title' => 'Not Registered!',
                    'message' => 'Email is not linked with any account.',
                ],
            ]);
        }

        $token = Str::random(60);
        $user['token'] = $token;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));

        if(Mail::failures() != 0) {
            return back()->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Email sent!',
                    'message' => 'An email with the password reset link has been sent to the registered email.',
                ],
            ]);
        } else {
            return back()->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Network error!',
                    'message' => 'Please try again.',
                ],
            ]);
        }
    }
}
