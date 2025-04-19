<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\WeightTargetRequest;
use App\Http\Requests\WeightStep2Request; 
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return redirect()->route('register.step2');
    }

    // 初期体重登録画面を表示
public function showStep2()
{
    return view('auth.register_step2');
}

    public function registerStep2(WeightStep2Request $request)
{
    $user = auth()->user();

   DB::transaction(function () use ($user, $request) {
        // 目標体重を weight_targets テーブルに保存
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->input('target_weight'),
        ]);

        // 現在の体重を weight_logs テーブルに保存
        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->toDateString(), // 今日の日付
            'weight' => $request->input('weight'),
            'calories' => null,              // 初回登録なので空でOK
            'exercise_time' => null,
            'exercise_content' => null,
        ]);
    });

    return redirect()->route('weight_logs.index');

}


}
