<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{


    /**
     * 打刻ページの表示
     */
    public function stamp()
    {
        $param = Attendance::stamp();
        return view('stamp', $param);
    }

    /**
     *  勤務開始の処理
     */
    public function start(Request $request)
    {
        $data = Attendance::common();
        Attendance::create([
            "user_id"    => $data['user_id'],
            "date_on"    => $data['today'],
            "start_time" => $data['now']
        ]);
        return redirect("/");
    }

    /**
     *  勤務終了の処理
     */
    public function end(Request $request)
    {
        $data = Attendance::common();
        $atte = Attendance::where("user_id", $data['user_id'])
            ->where("date_on", $data['today'])
            ->first();

        //休憩終了が押せる状態なら休憩終了の処理を行う
        $rest_end = $request->rest_end;
        if ($rest_end) {
            $atte->rests->last()->update(
                ["end_time" => $data['now']]
            );
        }

        $atte->update(
            ["end_time" => $data['now']]
        );
        return redirect("/");
    }

    /**
     *  勤怠管理ページの表示
     */
    public function attendance($date)
    {
        //"日付一覧"をクリックした場合は今日の日付の情報を出す
        if ($date === "today") {
            $date = Carbon::today()->format('Y-m-d');
        }

        //user_idでソートすると表示される場所がある程度固定されるので確認が楽になる
        $attes = Attendance::where("date_on", $date)
            ->orderby("user_id")
            ->paginate(5);
        $param = [
            'date' => $date,
            'attes' => $attes
        ];
        return  view('attendance', $param);
    }
}
