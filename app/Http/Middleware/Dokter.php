<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Dokter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = Auth::user()->role_id;
        if($auth == 1 || $auth == 3) {
            return $next($request);
        }
        else {
            abort(403);
        }
        return $next($request);
    }
}
