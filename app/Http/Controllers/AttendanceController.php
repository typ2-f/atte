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
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        $attendance = Attendance::where("user_id", $user->id)->where("date_on", $today)->first();

        //isset($attendance->rests->last()->start_time) が
        //$attendance = null の際にエラーになるのでクッションとして$restsを定義する
        if (isset($attendance)) {
            $rests = $attendance->rests->last();
        } else {
            $rests = Null;
        };

        //各データが入っているかの判定を行う
        $atte_start    = isset($attendance->start_time);
        $atte_end      = isset($attendance->end_time);
        $rest_start    = isset($rests->start_time);
        $rest_end      = isset($rests->end_time);

        //データ有無をもとに各ボタンのクリック可否を判定し、viewに送る
        $param = [
            'user'          => $user->name,
            'atte_start'    => !$atte_start,
            'atte_end'      => $atte_start && !$atte_end,
            'rest_start'    => $atte_start && !$atte_end && ($rest_start === $rest_end),
            'rest_end'      => $atte_start && !$atte_end && $rest_start && !$rest_end
        ];
        return view('stamp', compact('param'));
    }

    /**
     *  勤務開始の処理
     */
    public function start(Request $request)
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        Attendance::create([
            "user_id"   => $user->id,
            "date_on"   => $today,
            "start_time" => $now
        ]);
        return redirect("/");
    }

    /**
     *  勤務終了の処理
     */
    public function end(Request $request)
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        Attendance::where("user_id", $user->id)
            ->where("date_on", $today)
            ->update(
                ["end_time" => $now]
            );
        return redirect("/");
    }

    /**
     *  勤怠管理ページの表示
     */
    public function attendance(Request $request)
    {
    }
}
