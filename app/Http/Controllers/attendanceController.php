<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function stamp()
    {
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
    public function attendance()
    {
    }
}
