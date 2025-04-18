<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    // ログインフォームを表示するメソッド
    public function create()
    {
        return view('auth.login'); // ここでログインフォームのビューを返します
    }

    // ログイン処理を行うメソッド
    public function store(Request $request): RedirectResponse
    {
        // バリデーション
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 認証処理
        if (Auth::attempt($request->only('email', 'password'))) {
            // ログイン成功時のリダイレクト
            return redirect()->intended('/weight_logs'); // ログイン後、管理画面などにリダイレクト
        }

        // 認証失敗時
        return back()->withErrors([
            'email' => '認証情報が一致しません。',
        ]);
    }

    // ログアウト処理
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // ログイン画面にリダイレクト
    }
}
