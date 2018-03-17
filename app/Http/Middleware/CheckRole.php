<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null){
            return response('Insuficient permissions', 401);
        }

        $roles = array('Manager','Owner');
        // dd($roles);
        if($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }
        return redirect('/notAuthorized');
    }
}
