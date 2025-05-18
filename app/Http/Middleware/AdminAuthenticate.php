<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'admin'){

        if(!Auth::guard($guard)->check()){
            return redirect(Route('admin.auth.login'));
        }
    }
}