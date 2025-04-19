{{-- resources/views/weight_logs/index.blade.php --}}

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/index.css') }}">

@endsection

@section('content')
<div class="summary-container">
    <div class="summary-box">
        <div class="summary-label">目標体重</div>
        <div class="summary-value">
            {{ Auth::user()->target_weight ?? '-' }}<span class="summary-unit">kg</span>
        </div>
    </div>
    <div class="summary-divider"></div>
    <div class="summary-box">
        <div class="summary-label">目標まで</div>
        <div class="summary-value">
            @php
                $latest = $weightLogs->first();
                $diff = $latest && Auth::user()->target_weight ? number_format($latest->weight - Auth::user()->target_weight, 1) : '-';
            @endphp
            {{ $diff }}<span class="summary-unit">kg</span>
        </div>
    </div>
    <div class="summary-divider"></div>
    <div class="summary-box">
        <div class="summary-label">最新体重</div>
        <div class="summary-value">
            {{ $latest ? number_format($latest->weight, 1) : '-' }}<span class="summary-unit">kg</span>
        </div>
    </div>
</div>

{{-- 検索フォーム --}}
<div class="search-section">
    <form method="GET" action="{{ route('weight_logs.index') }}" class="search-form">
        <label>古い日付:
            <input type="date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
        </label>
        <span class="search-to">〜</span>
        <label>新しい日付:
            <input type="date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
        </label>
        <input type="submit" value="検索" class="search-button">
        @if (!empty($start_date) && !empty($end_date))
            <a href="{{ route('weight_logs.index') }}" class="reset-button">リセット</a>
        @endif
    </form>

    @if (!empty($start_date) && !empty($end_date))
        <div class="search-result-info">
            「{{ $start_date }} 〜 {{ $end_date }}」の検索結果　
            {{ $weightLogs->total() }}件
        </div>
    @endif
</div>
{{-- データ追加ボタン --}}
<div class="add-button-container">
    <a href="{{ route('weight_logs.create') }}" class="submit-button">データ追加</a>
</div>


{{-- テーブル表示 --}}
<table class="weight-table">
    <thead>
        <tr>
            <th>日付</th>
            <th>体重</th>
            <th>摂取カロリー</th>
            <th>運動時間</th>
            <th>編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($weightLogs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td>{{ number_format($log->weight, 1) }}kg</td>
                <td>{{ $log->calories }}cal</td>
                <td>{{ \Carbon\Carbon::parse($log->exercise_time)->format('H:i') }}</td>
                <td>
                    <a href="{{ route('weight_logs.edit', $log->id) }}">
                        <img src="{{ asset('images/icon-edit.svg') }}" alt="編集" width="20">
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- ページネーション --}}
<div class="pagination-container">
    {{ $weightLogs->links('pagination::bootstrap-4') }}
</div>
@endsection
