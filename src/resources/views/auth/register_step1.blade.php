<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録 - PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/auth/register_step1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <div class="form-container">
        <h2>PIGLY</h2>
        <h3>新規会員登録</h3>
        <div class="step-label">STEP1 アカウント情報の登録</div>

        <form method="POST" action="{{ route('register.step1.post') }}">
            @csrf

            <label for="name">お名前</label>
            <input type="text" id="name" name="name" placeholder="名前を入力" value="{{ old('name') }}">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

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

            <input type="submit" class="submit-button" value="次に進む">
        </form>

        <a class="login-link" href="{{ route('login') }}">ログインはこちら</a>
    </div>
</body>
</html>
