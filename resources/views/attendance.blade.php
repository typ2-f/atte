@extends('default.common')
@section('content')
    <div>

        <ul class="date-head">
            <li class="date-list">
                <a class="arrow" href="{!! '/attendance/' . date('Y-m-d', strtotime('-1 day', strtotime($date))) !!}">&lt;</a>
            </li>
            <li class="date-list date">
                {{ $date }}
            </li>
            <li class="date-list">
                <a class="arrow" href="{!! '/attendance/' . date('Y-m-d', strtotime('+1 day', strtotime($date))) !!}">&gt;</a>
            </li>
        </ul>
        <table>
            <tr class="list-title">
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach ($attes as $atte)
                <tr class="list-content">
                    <td>{{ $atte->user->name }}</td>
                    <td>{{ $atte->start_time }}</td>
                    <td>{{ $atte->end_time }}</td>
                    <td>{{ $atte->calcAtte()['rests'] }}</td>
                    <td>{{ $atte->calcAtte()['work'] }}</td>
                </tr>
            @endforeach
        </table>
        {{ $attes->links() }}
    </div>
@endsection
