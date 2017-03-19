<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
            if(auth()->user()->isAdmin())
                return $next($request);
            else
                if($request->ajax()){
                    return response()->json([
                        'message' => 'You don\'t have access to this page.',
                        'error' => 'role_mismatch'
                    ], 403);
                }
                else
                {
                    $msg = new MessageBag();
                    $message = 'You don\'t have access to this page.';
                    $msg->add('message', $message);
                    return redirect()->back()->withErrors($msg);
                }
        }
        return $request->ajax()?response()->json([
            'message' => 'You need to log in first.',
            'error' => 'auth_required'
        ]):redirect()->intended('login');
    }
}
