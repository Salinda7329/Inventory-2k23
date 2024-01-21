<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        switch ($role) {
            case 5:
                return redirect()->route('systemAdmin.home');
            case 4:
                // head of administration
                break;
            case 3:
                // purchasing manager
                break;
            case 2:
                return redirect()->route('storeManager.home');
            case 1:
                return redirect()->route('user.home');
            default:
                return redirect('/dashboard'); // Change '/dashboard' to the default dashboard route
        }
    }
}

