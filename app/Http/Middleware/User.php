<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
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
        if(auth()->check()){
            if(auth()->user()->status > 0)
                return $next($request);
            else
                return response()->json([
                    'message' => 'Verify your account first',
                    'error' => 'account_verification'
                ], 403);

        }
        return $request->ajax()?response()->json([
            'message' => 'You need to log in first.',
            'error' => 'auth_required'
        ]):redirect()->intended('login');
    }
}
