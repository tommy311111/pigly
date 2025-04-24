<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400&display=swap" rel="stylesheet">
</head>
<body style="background-color: #F9F9F9;">
    <header class="header">
        <div class="header-left">PIGLY</div>
        <div class="header-right">
            <a href="{{ route('weight_logs.goal_setting') }}" class="header-btn">
                <img src="{{ asset('images/icon-settings.svg') }}" alt="設定"> 目標体重設定
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="header-btn">
                    <img src="{{ asset('images/icon-logout.svg') }}" alt="ログアウト"> ログアウト
                </button>
            </form>
        </div>
    </header>

    <main class="content">
        <div class="modal-overlay show-modal">
            <div class="modal-content">
                <h2 class="modal-title">Weight Logを追加</h2>
                <form action="{{ route('weight_logs.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="modal-group">
                        <label for="date">日付 <span class="required-label">必須</span></label>
                        <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" required placeholder="2024年1月1日">
                        @error('date')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-group">
                        <label for="weight">体重 <span class="required-label">必須</span></label>
                        <div class="input-with-unit">
                            <input type="number" step="0.1" name="weight" id="weight" required placeholder="50.0" value="{{ old('weight') }}">
                            <span class="unit-label">kg</span>
                        </div>
                        @error('weight')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-group">
                        <label for="calories">摂取カロリー <span class="required-label">必須</span></label>
                        <div class="input-with-unit">
                            <input type="number" name="calories" id="calories" required placeholder="1200" value="{{ old('calories') }}">
                            <span class="unit-label">cal</span>
                        </div>
                        @error('calories')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-group">
                        <label for="exercise_time">運動時間（時:分） <span class="required-label">必須</span></label>
                        <input type="time" name="exercise_time" id="exercise_time" required placeholder="00:00" value="{{ old('exercise_time') }}">
                        @error('exercise_time')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-group">
                        <label for="exercise_content">運動内容</label>
                        <textarea name="exercise_content" id="exercise_content" rows="4" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
                        @error('exercise_content')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-buttons">
                        <a href="{{ route('weight_logs.index') }}" class="back-button">戻る</a>
                        <button type="submit" class="submit-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
