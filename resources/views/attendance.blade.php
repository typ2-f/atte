@extends('default.common')
@section('title', 'atte-勤怠')

@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection



@section('content')
    <ul class="date-head">
        <li class="date-arrow">
            <a class="arrow" href="{!! '/attendance/' . date('Y-m-d', strtotime('-1 day', strtotime($date))) !!}">&lt;</a>
        </li>
        <li class="date">
            {{ $date }}
        </li>
        <li class="date-arrow">
            <a class="arrow" href="{!! '/attendance/' . date('Y-m-d', strtotime('+1 day', strtotime($date))) !!}">&gt;</a>
        </li>
    </ul>
    <div class="atte-data">
        <table class="atte-table">
            <tr class="atte-tr">
                <th class="atte-th">名前</th>
                <th class="atte-th">勤務開始</th>
                <th class="atte-th">勤務終了</th>
                <th class="atte-th">休憩時間</th>
                <th class="atte-th">勤務時間</th>
            </tr>
            @foreach ($attes as $atte)
                <tr class="atte-tr">
                    <td class="atte-td">{{ $atte->user->name }}</td>
                    <td class="atte-td">{{ $atte->start_time }}</td>
                    <td class="atte-td">{{ $atte->end_time }}</td>
                    <td class="atte-td">{{ $atte->calcAtte()['rests'] }}</td>
                    <td class="atte-td">{{ $atte->calcAtte()['work'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $attes->links('vendor.pagination.default') }}

@endsection
