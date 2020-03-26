<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserInformation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->first_name || !Auth::user()->last_name || !Auth::user()->mobile_number || !Auth::user()->email_address) {
            return redirect()->route('signup.form');
        }
        
        return $next($request);
    }
}
