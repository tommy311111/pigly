<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\WeightStep2Request; 
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterStepController extends Controller
{
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    public function registerStep1(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        return view('auth.register_step2');
    }

    public function registerStep2(WeightStep2Request $request)
    {
        $user = auth()->user();

        DB::transaction(function () use ($user, $request) {
            WeightTarget::create([
                'user_id' => $user->id,
                'target_weight' => $request->input('target_weight'),
            ]);

            WeightLog::create([
                'user_id' => $user->id,
                'date' => now()->toDateString(),
                'weight' => $request->input('weight'),
                'calories' => null,
                'exercise_time' => null,
                'exercise_content' => null,
            ]);
        });

        return redirect()->route('weight_logs.index');
    }
}
