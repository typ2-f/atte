<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>@yield('title')</title>
    <link rel='stylesheet' href='{{ asset('css/reset.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/common.css') }}'>
    <link rel='shortcut icon' href='{{ asset('/atte-favicon.ico') }}'>
    @yield('pageCSS')
</head>
<body>
    @include('default.header')
    <div class='contents'>
            @yield('content')
    </div>
    @include('default.footer')
    <script src={{ asset('js/main.js') }}></script>
    @yield('pageJS')
</body>
</html>
