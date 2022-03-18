@extends('default.common')

@section('content')
    <form action='/' method=post>
        @csrf
        <button type='submit' name='attendance_start'>勤務開始</button>
    </form>
    <form action='/' method=post>
        @csrf
        <button type='submit' name='attendance_end'>勤務終了</button>
    </form>
    <form action='/' method=post>
        @csrf
        <button type='submit' name='rest_start'>休憩開始</button>
    </form>
    <form action='/' method=post>
        @csrf
        <button type='submit' name='rest_end'>休憩終了</button>
    </form>
@endsection
