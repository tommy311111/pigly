<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureWeightRegistered
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        if (Auth::user()->weight_target || $request->is('register-step2')) {
            return $next($request);
        }

        return redirect('/register-step2');
    }
}
