<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ( Auth::guard($guard)->check() && Auth::user()->role == 'admin' )  {
                return redirect()->route('admin.dashboard');
            }elseif ( Auth::guard($guard)->check() && Auth::user()->role == 'author' ){
                return redirect()->route('author.dashboard');
            }else{
                return $next($request);
            }
        }
        
        return $next($request);
    }
}
