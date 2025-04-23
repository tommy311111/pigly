<!DOCTYPE html>
<html lang="ja">

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - PIGLY</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>
<body>
    <div class="form-container">
        <h2>PIGLY</h2>
        <h3>@yield('heading')</h3>
        @yield('step')
        
        @yield('content')
    </div>
</body>
</html>
