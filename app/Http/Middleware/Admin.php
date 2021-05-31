<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!Auth::check()){
            return redirect('/admin/admin-login');
        } 
        else {
            $auth = Auth::user()->role_id;
            if($auth == 1 || $auth == 3 || $auth == 4) {
                return $next($request);
            }
            else {
                abort(403);
            }
        }
    }
}
