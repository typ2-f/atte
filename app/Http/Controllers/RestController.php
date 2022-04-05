<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

use function PHPSTORM_META\map;

class RestController extends Controller
{
    /**
     *  休憩開始の処理
     */
    public function start(Request $request)
    {
        $data = Attendance::Common();
        $atte = Attendance::where("user_id", $data['user_id'])->where("date_on", $data['today'])->first();
        Rest::create([
            "attendance_id" => $atte->id,
            "start_time"    => $data['now']
        ]);
        return redirect("/");
    }

    /**
     *  休憩終了の処理
     */
    public function end(Request $request)
    {
        $data = Attendance::Common();
        $atte = Attendance::where("user_id", $data['user_id'])->where("date_on", $data['today'])->first();
        Rest::where("attendance_id", $atte->id)->latest()->first()
            ->update(
                ["end_time" => $data['now']]
            );
        return redirect("/");
    }


}
