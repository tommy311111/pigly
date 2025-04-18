<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン - PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/auth/register_step1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="form-container">
        <h2>PIGLY</h2>
        <h3>ログイン</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="パスワードを入力">
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="submit" class="submit-button" value="ログイン">
        </form>

        <a class="login-link" href="{{ route('register.step1') }}">アカウント作成はこちら</a>
    </div>
</body>
</html>
