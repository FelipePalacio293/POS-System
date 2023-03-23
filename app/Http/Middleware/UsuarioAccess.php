<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class UsuarioAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!User::find(Session::has('loginId'))->isUsuario() && !User::find(Session::has('loginId'))->isAdmin()){
            return redirect()->to('login');
        }
        return $next($request);
    }
}
