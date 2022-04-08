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
     *
     *  出勤していて、休憩の開始・終了の状態が同じときRest::createできる
     */
    public function start(Request $request)
    {
        $data = Attendance::common();
        if ($data['atte_start'] && ($data['rest_start'] === $data['rest_end'])) {
            Rest::create([
                'attendance_id' => $data['atte']->id,
                'start_time'    => $data['now']
            ]);
            return redirect('/');
        } else {
            //既に休憩中ならエラーメッセージを表示する
            return redirect('/')->with('error', $data['atte']->rests->last()->start_time . ' から休憩中です');
        }
    }

    /**
     *  休憩終了の処理
     *
     *  休憩を開始し、かつ終了していないとき処理を実行できる
     */
    public function end(Request $request)
    {
        $data = Attendance::common();
        if ($data['rest_start'] && !$data['rest_end']) {
            $data['atte']->rests->last()
                ->update(
                    ['end_time' => $data['now']]
                );
            return redirect('/');
        } else {
            //休憩してください
            return redirect('/')->with('error', '休憩を開始していません');
        }
    }
}
