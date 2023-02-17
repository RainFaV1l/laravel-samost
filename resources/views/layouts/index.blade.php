<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="wrapper__container">
            @include('components.header')
            @yield('content')
            @include('components.footer')
        </div>
    </div>
</body>
</html>
