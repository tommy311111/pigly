<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureWeightRegistered
{
    public function handle(Request $request, Closure $next)
    {
    // 未ログインならスルー
        if (!Auth::check()) {
            return $next($request);
        }

    // すでに初期体重登録済み or 初期体重登録画面ならOK
        if (Auth::user()->weight_target || $request->is('register-step2')) {
            return $next($request);
        }

    // それ以外は強制的に体重登録画面へ
        return redirect('/register-step2');
    }
}
