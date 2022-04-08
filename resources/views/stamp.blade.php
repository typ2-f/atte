@extends('default.common')
@section('title', 'atte-ホーム')
@section('pageCSS')
    <link rel='stylesheet' href='{{ asset('css/stamp.css') }}'>
@endsection

@section('content')

    <p class='content-ttl'>{{ $user }}さんお疲れ様です</p>
    <div class='flash-msg'>　
        @if (session('error'))
            {{ session('error') }}
        @endif
    </div>
    <section class='stamps'>
        <!--勤務開始-->
        <form action='/atte/start' method=post class='atte-start' id='atte-start'>
            @csrf
            <x-btn_stamp :detect='$atte_start_det'>
                勤務開始
            </x-btn_stamp>
        </form>

        <!--勤務終了-->
        <form action='/atte/end' method=post class='atte-end' id='atte-end'>
            @csrf
            <x-btn_stamp :detect='$atte_end_det'>
                勤務終了
            </x-btn_stamp>
        </form>

        <!--休憩開始-->
        <form action='/rest/start' method=post class='rest-start' id='rest-start'>
            @csrf
            <x-btn_stamp :detect='$rest_start_det'>
                休憩開始
            </x-btn_stamp>
        </form>

        <!--休憩終了-->
        <form action='/rest/end' method=post class='rest-end' id='rest-end'>
            @csrf
            <x-btn_stamp :detect='$rest_end_det'>
                休憩終了
            </x-btn_stamp>
        </form>
    </section>
@endsection

@section('pageJS')
    <script src={{ asset('js/stamp.js') }}></script>
    <script src='https://unpkg.com/dayjs'></script>
    <script src='https://unpkg.com/dayjs@1.7.7/locale/ja.js'></script>
@endsection
