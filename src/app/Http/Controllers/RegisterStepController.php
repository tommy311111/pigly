<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\WeightTargetRequest; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterStepController extends Controller
{
    // Step1 の画面表示
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    // Step1 の登録処理（ユーザー作成）
    public function registerStep1(UserRegisterRequest $request)
    {
        // バリデーション済みデータは $request に入ってる！

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/register-step2');
    }

    // 初期体重登録画面を表示
public function showStep2()
{
    return view('auth.register_step2');
}

// 初期体重を登録する処理
public function registerStep2(WeightTargetRequest $request)
{
    $user = auth()->user();

    $user->weight_target = $request->input('target_weight');
    $user->save();

    return redirect(RouteServiceProvider::HOME); 
}
}
