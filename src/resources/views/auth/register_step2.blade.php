<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録 - PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/auth/register_step2.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="form-container">
        <h2>PIGLY</h2>
        <h3>新規会員登録</h3>
        <div class="step-label">STEP2 体重データの入力</div>

        <form method="POST" action="{{ route('register.step2.post') }}">
            @csrf

            <label for="current_weight">現在の体重</label>
            <div class="weight-input-container">
                <input type="text" id="current_weight" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}">
                <span class="weight-unit">kg</span>
            </div>
            @error('current_weight')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="target_weight">目標体重</label>
            <div class="weight-input-container">
                <input type="text" id="target_weight" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}">
                <span class="weight-unit">kg</span>
            </div>
            @error('target_weight')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="submit" class="submit-button" value="アカウントを作成">
        </form>
    </div>
</body>
</html>
