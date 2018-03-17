<?php

namespace App\Http\Middleware;

use Closure;

class isOwner
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
        if( $request->user() ) {
            $user = $request->user();
            if ( $user->role->name == "owner" ) {
                return $next($request);
            }
        }
        return redirect('/school');
    }
}
