<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStoreManagerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role == 2) {
            return $next($request);
        }

        // Redirect or abort if the user doesn't have the required role
<<<<<<< HEAD
        return redirect()->back();
=======
        return redirect('/dashboard');
>>>>>>> b785b362ee8562ea8427f90595bfce4898bbea27
    }
}
