@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/show.css') }}">
@endsection

@section('content')
<div class="weight-log-container">
    <h2 class="weight-log-title">Weight Log</h2>

    {{-- 更新フォーム --}}
    <form action="{{ route('weight_logs.update', $weightLog->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="weight-log-group">
            <label for="date">日付</label>
            <input type="date" name="date" id="date" value="{{ old('date', $weightLog->date) }}">
            @error('date')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="weight-log-group">
            <label for="weight">体重</label>
            <div class="input-with-unit">
                <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight', $weightLog->weight) }}">
                <span class="unit-label">kg</span>
            </div>
            @error('weight')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="weight-log-group">
            <label for="calories">摂取カロリー</label>
            <div class="input-with-unit">
                <input type="number" name="calories" id="calories" value="{{ old('calories', $weightLog->calories) }}">
                <span class="unit-label">cal</span>
            </div>
            @error('calories')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="weight-log-group">
            <label for="exercise_time">運動時間（時:分）</label>
            <input type="time" name="exercise_time" id="exercise_time"
       value="{{ old('exercise_time', substr($weightLog->exercise_time, 0, 5)) }}">

            @error('exercise_time')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="weight-log-group">
            <label for="exercise_content">運動内容</label>
            <textarea name="exercise_content" id="exercise_content" rows="4">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
            @error('exercise_content')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- ボタンエリア --}}
        <div class="button-row">
            <div class="left-buttons">
                <a href="{{ route('weight_logs.index') }}" class="back-button">戻る</a>
                <button type="submit" class="update-button">更新</button>
            </div>
    </form> {{-- ← 更新フォームの閉じタグ --}}

            {{-- 削除フォーム --}}
            <form method="POST" action="{{ route('weight_logs.delete', $weightLog->id) }}" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか？')">
                    <img src="{{ asset('images/icon-trash.svg') }}" alt="削除" class="trash-icon">
                </button>
            </form>
        </div>
</div>
@endsection
