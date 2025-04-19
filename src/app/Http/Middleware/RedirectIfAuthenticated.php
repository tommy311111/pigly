<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // もし認証されている場合
        if (Auth::check()) {
            // 初期体重登録がまだなら、`register-step2`にリダイレクト
            if (Auth::user()->target_weight === null) {
                return redirect('/register-step2');
            }
            // それ以外はデフォルトのホームにリダイレクト
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
