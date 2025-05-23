<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;

class WeightLogController extends Controller
{
    public function index(Request $request)
    {
        $query = WeightLog::where('user_id', Auth::id());

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $weightLogs = $query->orderBy('date', 'desc')->paginate(8);
        $targetWeight = Auth::user()->weight_target->target_weight ?? null;

        return view('weight_logs.index', compact('weightLogs', 'targetWeight'))
            ->with('start_date', $request->start_date)
            ->with('end_date', $request->end_date);
    }

    public function create()
    {
        return view('weight_logs.create');
    }

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

        return redirect()->route('weight_logs.index')->with('success', '体重記録を追加しました');
    }

    public function show($id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);

        return view('weight_logs.show', compact('weightLog'));
    }

    public function update(WeightLogRequest $request, $id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);
        $weightLog->update($request->validated());

        return redirect()->route('weight_logs.index')->with('success', '目標体重を更新しました');
    }

    public function destroy($id)
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->findOrFail($id);
        $weightLog->delete();

        return redirect()->route('weight_logs.index')->with('success', '記録を削除しました');
    }
}
