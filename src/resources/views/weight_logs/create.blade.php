@extends('layouts.app')

@section('content')
<div class="modal-overlay show-modal">
    <div class="modal-content">
        <h2 class="modal-title">体重記録の追加</h2>
        <form action="{{ route('weight_logs.store') }}" method="POST">
            @csrf

            <div class="modal-group">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="modal-group">
                <label for="weight">体重</label>
                <input type="number" step="0.1" name="weight" id="weight" required>
            </div>

            <div class="modal-group">
                <label for="calories">摂取カロリー</label>
                <input type="number" name="calories" id="calories" required>
            </div>

            <div class="modal-group">
                <label for="exercise_time">運動時間（時:分）</label>
                <input type="time" name="exercise_time" id="exercise_time" required>
            </div>

            <div class="modal-group">
                <label for="exercise_content">運動内容</label>
                <input type="text" name="exercise_content" id="exercise_content">
            </div>

            <div class="modal-buttons">
                <a href="{{ route('weight_logs.index') }}" class="cancel-button">キャンセル</a>
                <button type="submit" class="submit-button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
