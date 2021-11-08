<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Passenger
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
        if (Auth::check() && Auth::user()->isCustomer()) {
            throw ValidationException::withMessages(['Passenger' => 'This details is incorrect']);
            return redirect('/login');
        } else if(Auth::user()->email_verified_at == null){
            return redirect('/verify_account');
        }

        return $next($request);
    }
}