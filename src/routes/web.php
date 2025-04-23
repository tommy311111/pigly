<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/test', function () {
    return 'Hello from test route!';
});

Route::get('/register/step1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [RegisterStepController::class, 'registerStep1'])->name('register.step1.post');

Route::get('/register-step2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step2', [RegisterStepController::class, 'registerStep2'])->name('register.step2.post');

// ログインルートを修正
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // ログインフォーム
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // ログイン処理

Route::middleware(['auth', 'ensure.weight.registered'])->group(function () {
    Route::resource('weight_logs', WeightLogController::class)->except(['create', 'show']);

    // 目標体重設定ルートの名前を weight_logs.goal_setting に変更
Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'edit'])->name('weight_logs.goal_setting');
Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'save'])->name('weight_logs.goal_setting.save');

    Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create');
    Route::get('/weight_logs/{id}', [WeightLogController::class, 'show'])->name('weight_logs.show');
    Route::put('/weight_logs/{id}/update', [WeightLogController::class, 'update'])->name('weight_logs.update');
    Route::delete('/weight_logs/{id}/delete', [WeightLogController::class, 'destroy'])->name('weight_logs.delete');



});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
