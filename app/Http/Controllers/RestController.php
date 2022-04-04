<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;


class RestController extends Controller
{
    /**
     *  休憩開始の処理
     */
    public function start(Request $request)
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        $attendance = Attendance::where("user_id", $user->id)->where("date_on", $today)->first();
        Rest::create([
            "attendance_id" => $attendance->id,
            "start_time"    => $now
        ]);
        return redirect("/");
    }

    /**
     *  休憩終了の処理
     */
    public function end(Request $request)
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        $attendance = Attendance::where("user_id", $user->id)->where("date_on", $today)->first();

        Rest::where("attendance_id", $attendance->id)->latest()->first()
            ->update(
                ["end_time" => $now]
            );
        return redirect("/");
    }
}
