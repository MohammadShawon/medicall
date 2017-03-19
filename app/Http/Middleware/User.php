<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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
            if(!auth()->user()->isPendingUser())
                return $next($request);
            else
            if($request->ajax()){
                return response()->json([
                    'message' => 'Verify your account first',
                    'error' => 'account_verification'
                ], 403);
            }
            else
            {
                $msg = new MessageBag();
                $msg->add('message', 'You need to verify your account first to access the requested page.');
                return redirect()->intended('/')->withErrors($msg);
            }
        }
        return $request->ajax()?response()->json([
            'message' => 'You need to log in first.',
            'error' => 'auth_required'
        ]):redirect()->intended('login');
    }
}
