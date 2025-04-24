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
        if (Auth::check()) {
            if (Auth::user()->target_weight === null) {
                return redirect('/register-step2');
            }

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
