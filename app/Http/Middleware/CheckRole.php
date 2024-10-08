<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(!Auth::check())
        {
            return redirect('login');
        }

        $user = Auth::user();

        if (!in_array($user->rol, $roles))
        {
            return redirect('/')->with('mensaje', 'No tienes permiso para acceder a esta página');
        }

        return $next($request);
    }
}
