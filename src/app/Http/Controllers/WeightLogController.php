<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;

class WeightLogController extends Controller
{
    // 一覧表示
    public function index()
    {
        $weightLogs = WeightLog::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();

        return view('weight_logs.index', compact('weightLogs'));
    }

    // 登録（モーダルなどから）
    public function store(WeightLogRequest $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->back()->with('success', '体重記録を追加しました');
    }

    // 編集フォームの表示
    public function edit($id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);

        return view('weight_logs.edit', compact('weightLog'));
    }

    // 更新処理
    public function update(WeightLogRequest $request, $id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);

        $weightLog->update($request->validated());

        return redirect()->route('weight_logs.index')->with('success', '記録を更新しました');
    }

    // 削除処理
    public function destroy($id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);
        $weightLog->delete();

        return redirect()->back()->with('success', '記録を削除しました');
    }
}
