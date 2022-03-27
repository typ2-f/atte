<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * 打刻ページの表示
     */
    public function stamp()
    {
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        return view('stamp');
    }

    /**
     *  勤務開始の処理
     */
    public function start(Request $request)
    {

    }

    /**
     *  勤務終了の処理
     */
    public function end(Request $request)
    {
    }

    /**
     *  勤怠管理ページの表示
     */
    public function attendance(Request $request)
    {
        $items = Attendance::with()
    }
}
