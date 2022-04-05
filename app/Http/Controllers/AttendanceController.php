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
        Attendance::where("user_id", $data['user_id'])
            ->where("date_on", $data['today'])
            ->first()
            ->update(
                ["end_time" => $data['now']]
            );
        return redirect("/");
    }

    /**
     *  勤怠管理ページの表示
     */
    public function attendance(Request $request)
    {
        $data = Attendance::common();
        $attes = Attendance::where("date_on", $data['today'])->paginate(4);
        return  view('attendance', ['attes' => $attes]);
    }

    
}
