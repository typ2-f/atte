<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('pageCSS')
</head>

<body>
    @include('layouts.header')
    <div class='grayBox'>
        <div class="contents">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')


    <script src={{ asset('js/main.js') }}></script>
    @yield(`pageJS`)
</body>

</html>
