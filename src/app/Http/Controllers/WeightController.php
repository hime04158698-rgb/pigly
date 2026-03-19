<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\UpdateWeightLogRequest;
use App\Models\WeightTarget;

class WeightController extends Controller
{
    public function index(Request $request)
    {
        $query = WeightLog::where('user_id', auth()->id());

        if ($request->filled('start_date')) {
            $query->where('date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->where('date', '<=', $request->end_date);
        }

        $weightLogs = $query->orderBy('date', 'desc')->paginate(8);

        $latestWeight = WeightLog::where('user_id', auth()->id())
    ->orderBy('date', 'desc')
    ->first();

        $weightTarget = WeightTarget::where('user_id', auth()->id())->first();

        $diff = null;

        if ($latestWeight && $weightTarget) {
            $diff = $latestWeight->weight - $weightTarget->target_weight;
        }

        return view('weight_logs.index', compact(
            'weightLogs',
            'latestWeight',
            'weightTarget',
            'diff'
        ));
    }
    public function create()
    {
        return view('weight_logs.create');
    }
    public function store(StoreWeightLogRequest $request)
    {
        WeightLog::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }
    public function edit(WeightLog $weightLog)
    {
        if ($weightLog->user_id !== auth()->id()) {
            abort(403);
        }

        return view('weight_logs.edit', compact('weightLog'));
    }

    public function update(UpdateWeightLogRequest $request, WeightLog $weightLog)
    {
        if ($weightLog->user_id !== auth()->id()) {
            abort(403);
        }

        $weightLog->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }
    public function destroy(WeightLog $weightLog)
    {
        if ($weightLog->user_id !== auth()->id()) {
            abort(403);
        }

        $weightLog->delete();

        return redirect('/weight_logs');
    }
    public function goalSetting()
    {
        $weightTarget = WeightTarget::firstOrCreate(
            ['user_id' => auth()->id()],
            ['target_weight' => 50.0]
        );

        return view('weight_logs.goal_setting', compact('weightTarget'));
    }

    public function updateGoal(Request $request)
    {
        $weightTarget = WeightTarget::where('user_id', auth()->id())->first();

        $weightTarget->update([
            'target_weight' => $request->target_weight,
        ]);

        return redirect('/weight_logs');
    }
}
