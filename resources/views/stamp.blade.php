@extends('default.common')

@section('content')

    <p>{{ $param['user'] }}さんお疲れ様です</p>
    <p id="RealtimeClockArea"></p>
    <!--勤務開始-->
    <form action='/atte/start' method=post>
        @csrf
        <x-btn_stamp :detect="$param['atte_start']">
            勤務開始
        </x-btn_stamp>
    </form>

    <!--勤務終了-->
    <form action='/atte/end' method=post>
        @csrf
        <x-btn_stamp :detect="$param['atte_end']">
            勤務終了
        </x-btn_stamp>
    </form>

    <!--休憩開始-->
    <form action='/rest/start' method=post>
        @csrf
        <x-btn_stamp :detect="$param['rest_start']">
            休憩開始
        </x-btn_stamp>
    </form>

    <!--休憩終了-->
    <form action='/rest/end' method=post>
        @csrf
        <x-btn_stamp :detect="$param['rest_end']">
            休憩終了
        </x-btn_stamp>
    </form>
@endsection

@section('pageJS')
    <script src={{ asset('js/clock.js') }}></script>
@endsection



