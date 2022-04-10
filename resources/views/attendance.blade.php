@extends('default.common')
@section('title', 'atte-勤怠')

@section('pageCSS')
    <link rel='stylesheet' href='{{ asset('css/attendance.css') }}'>
@endsection



@section('content')
    <ul class='date_head'>
        <li class='date_arrow'>
            <a class='arrow' href='{!! '/attendance/' . date('Y-m-d', strtotime('-1 day', strtotime($date))) !!}'>&lt;</a>
        </li>
        <li class='date'>
            {{ $date }}
        </li>
        <li class='date_arrow'>
            <a class='arrow' href='{!! '/attendance/' . date('Y-m-d', strtotime('+1 day', strtotime($date))) !!}'>&gt;</a>
        </li>
    </ul>
    <div class='atte_data'>
        <table class='atte_table'>
            <tr class='atte_tr'>
                <th class='atte_th'>名前</th>
                <th class='atte_th'>勤務開始</th>
                <th class='atte_th'>勤務終了</th>
                <th class='atte_th'>休憩時間</th>
                <th class='atte_th'>勤務時間</th>
            </tr>
            @foreach ($attes as $atte)
                <tr class='atte_tr'>
                    <td class='atte_td'>{{ $atte->user->name }}</td>
                    <td class='atte_td'>{{ $atte->start_time }}</td>
                    <td class='atte_td'>{{ $atte->end_time }}</td>
                    <td class='atte_td'>{{ $atte->calcAtte()['rests'] }}</td>
                    <td class='atte_td'>{{ $atte->calcAtte()['work'] }}</td>
                </tr>
            @endforeach
        </table>
        <div class="paginate_link_default">
            {{ $attes->links() }}
        </div>
        <div class="paginate_link_sp">
            {{ $attes->links('vendor.pagination.for_smartphone') }}
        </div>
    </div>


@endsection
