<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use phpDocumentor\Reflection\Types\Null_;

class AttendanceController extends Controller
{
    /**
     * 打刻ページの表示
     */
    public function stamp()
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');

        //Attendancesテーブル,Restテーブルの確認
        $attendance = Attendance::where("user_id", $user->id)->where("date_on", $today)->first();
        if ($attendance != Null) {
            $rest = Rest::where("attendance_id", $attendance->id)->orderBy("id", "desc")->first();
        }else{
            $rest=Null;
        }
        //ボタンの活性or非活性を判定するためのパラメータを渡したい
        $param = ["user" => $user->name];


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
