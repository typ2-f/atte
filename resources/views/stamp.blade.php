@extends('default.common')
@section('title','atte-ホーム')
@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')

    <p>{{ $user }}さんお疲れ様です</p>
    <!--勤務開始-->
    <form action='/atte/start' method=post>
        @csrf
        <x-btn_stamp :detect="$atte_start">
            勤務開始
        </x-btn_stamp>
    </form>

    <!--勤務終了-->
    <form action='/atte/end' method=post>
        @csrf
        <input type="hidden" name="rest_end" value={{$rest_end}}>
        <x-btn_stamp :detect="$atte_end">
            勤務終了
        </x-btn_stamp>
    </form>

    <!--休憩開始-->
    <form action='/rest/start' method=post>
        @csrf
        <x-btn_stamp :detect="$rest_start">
            休憩開始
        </x-btn_stamp>
    </form>

    <!--休憩終了-->
    <form action='/rest/end' method=post>
        @csrf
        <x-btn_stamp :detect="$rest_end">
            休憩終了
        </x-btn_stamp>
    </form>
@endsection

@section('pageJS')
    <!--
        できそうならやりたい
        (1)ページ遷移をせずに勤怠の送信をする…XHRを利用？
        (2)イベントハンドラからボタンの活性非活性を切り替え
    -->
@endsection



