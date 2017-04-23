<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\MessageBag;

class Doctor
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
            if(auth()->user()->isDoctor())
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
                    if(auth()->user()->isPendingDoctor())
                    {
                        $message = 'Your need to verify your mail.';
                        $msg->add('message', $message);
                        return redirect()->back()->withErrors($msg);
                    }
                    if(auth()->user()->isBDMODoctor())
                    {
                        $message = 'Your doctor request is pending for approval.';
                        $msg->add('message', $message);
                        return redirect()->back()->withErrors($msg);
                    }

                }
        }
        return $request->ajax()?response()->json([
            'message' => 'You need to log in first.',
            'error' => 'auth_required'
        ]):redirect()->intended('login');
    }
}
