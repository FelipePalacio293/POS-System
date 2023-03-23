<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Session;

class VendedorAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(User::find(Session::has('loginId'))->isVendedor() || User::find(Session::has('loginId'))->isAdmin()){
            return $next($request);
            
        }
        return redirect()->to('login');
    }
}
