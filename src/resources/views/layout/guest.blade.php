<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pigly</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/guest.css')}}">
  @yield('css')
</head>

<body>
  
    <main>
        <div class="content">
         @yield('content')
        </div>
    </main>


</body>

</html>