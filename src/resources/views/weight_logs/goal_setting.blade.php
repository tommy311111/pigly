@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/weight_logs/goal_setting.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="outer-container">
    <div class="form-container">
        <h2 class="text-center mb-4">目標体重設定</h2>
        <form method="POST" action="{{ route('weight_logs.goal_setting.save') }}" novalidate>
            @csrf
            <div class="form-group d-flex align-items-center flex-column">
                <div class="d-flex w-100" style="max-width: 300px;">
                    <input
                        type="number"
                        name="target_weight"
                        class="form-control"
                        placeholder="{{ optional($user->weight_target)->target_weight ?? '例: 60.0' }}"
                        value="{{ old('target_weight', optional($user->weight_target)->target_weight) }}"
                        required>
                    <span class="kg-label">kg</span>
                </div>
                @error('target_weight')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="buttons-container">
                <a href="{{ route('weight_logs.index') }}" class="back-button">戻る</a>
                <button type="submit" class="submit-button">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection
