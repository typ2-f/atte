@extends('default.common')

@section('content')
    <p>{{ $param['user'] }}さんお疲れ様です</p>
    <!--勤務開始-->
    <form action='/atte/start' method=post>
        @csrf
        <button type='submit' name='attendance_start'>勤務開始</button>
    </form>

    <!--勤務終了-->
    <form action='/atte/end' method=post>
        @csrf
        <button type='submit' name='attendance_end'>勤務終了</button>
    </form>

    <!--休憩開始-->
    <form action='/rest/start' method=post>
        @csrf
        <button type='submit' name='rest_start'>休憩開始</button>
    </form>

    <!--休憩終了-->
    <form action='/rest/end' method=post>
        @csrf
        <button type='submit' name='rest_end'>休憩終了</button>
    </form>

    <form action='/atte/start' method=post>
        @csrf
        <x-button_test>
            あいうえお
        </x-button_test>
    </form>
@endsection
