<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightTargetRequest;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('weight_logs.goal_setting', compact('user'));
    }

    public function save(WeightTargetRequest $request)
    {
        \Log::info('=== WeightTargetController@save CALLED ===');

        $user = Auth::user();
        $target = $user->weight_target;

        if (!$target) {
            $target = new \App\Models\WeightTarget();
            $target->user_id = $user->id;
        }

        $target->target_weight = $request->input('target_weight');

        try {
            $target->save();
        } catch (\Exception $e) {
            \Log::error('Error saving target weight: ' . $e->getMessage());
            return back()->withErrors(['error' => '目標体重の更新に失敗しました。']);
        }

        return redirect()->route('weight_logs.index')->with('success', '目標体重を更新しました');
    }
}
