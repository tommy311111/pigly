<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/register/step1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterStepController::class, 'registerStep1'])->name('register.step1.post');

Route::get('/register-step2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step2', [RegisterStepController::class, 'registerStep2'])->name('register.step2.post');

Route::middleware(['auth', 'ensure.weight.registered'])->group(function () {
    Route::resource('weight_logs', WeightLogController::class)->except(['create', 'show']);
});

Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'edit'])->name('weight_target.edit');
Route::put('/weight_logs/goal_setting', [WeightTargetController::class, 'update'])->name('weight_target.update');


Route::middleware(['auth', 'weight.registered'])->group(function () {
    Route::get('/weight_logs', function () {
        return view('index'); // ここが管理画面になる
    })->name('weight_logs');
});


Route::get('/weight_logs', function () {
    return view('weight_logs'); // 必要に応じてコントローラを使っても良い
});

Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

