<!-- resources/views/layouts/app.blade.phpなどに追加 -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400&display=swap" rel="stylesheet">
</head>
<body style="background-color: #F9F9F9;">
    <header class="header">
        <div class="header-left">PIGLY</div>
        <div class="header-right">
            <!-- 目標体重設定ボタン（GET送信のフォームに変更） -->
        <a href="{{ route('weight_logs.goal_setting') }}" class="header-btn">
    <img src="{{ asset('images/icon-settings.svg') }}" alt="設定"> 目標体重設定
</a>
  

            <!-- ログアウトボタン -->
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="header-btn">
                    <img src="{{ asset('images/icon-logout.svg') }}" alt="ログアウト"> ログアウト
                </button>
            </form>
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>
</body>
</html>
