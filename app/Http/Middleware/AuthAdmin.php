<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        // if(Auth::check() && Auth::user()->is_admin === 1){
             return $next($request);
        // }else{
        //     //session()->flush();
        //     //return $next($request);
        //     return redirect(route('admin.login'));
        // }
    }
}
