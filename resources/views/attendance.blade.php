@extends('default.common')
@section('content')
    <div class="date">
        <!--確認している日付-->
    </div>
    <table>
        <tr class="list-title">
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach ( $attes as $atte)
        <tr class="list-content">
            <!--利用者の名前-->
            <td>
                {{$atte->user->name}}/
            </td>
            <!--勤務開始-->
            <td>
                {{$atte->start_time}}/
            </td>
            <!--勤務終了-->
            <td>
                {{$atte->end_time}}/
            </td>
            <!--休憩時間の合計-->
            <td>
                {{$atte->calcAtte()['rests']}}/
            </td>
            <!--勤務時間の合計-->
            <td>
                {{$atte->calcAtte()['work']}}/
            </td>
        </tr>
        @endforeach

    </table>
    {{$attes->links()}}
@endsection
