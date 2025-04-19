<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightTargetRequest;

class WeightTargetController extends Controller
{
     /**
     * 目標体重の編集フォームを表示
     */
    public function edit()
    {
        $user = Auth::user();
        return view('weight_logs.goal_setting', compact('user'));
    }

    /**
     * 目標体重の更新処理
     */
    public function update(WeightTargetRequest $request)
    {
        $user = Auth::user();
        $user->target_weight = $request->input('target_weight');
        $user->save();

        return redirect(RouteServiceProvider::HOME)->with('success', '目標体重を更新しました');
    }
}
