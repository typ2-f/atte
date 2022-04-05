<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date_on', 'start_time', 'end_time'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /**
     * 複数のメソッドで共通のデータを整理
     */
    public static function common()
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");
        $data = [
            'user_id'    => $user->id,
            'name'  => $user->name,
            'today' => $today,
            'now'   => $now
        ];
        return $data;
    }

    /**
     * 打刻ページにアクセスしたときに返すデータ
     */
    public static function stamp()
    {
        $data = Attendance::common();
        $atte = Attendance::where("user_id", $data['user_id'])
            ->where("date_on", $data['today'])
            ->first();

        if (isset($atte)) {
            $rests = $atte->rests->last();
        } else {
            $rests = Null;
        };

        //各データが入っているかの判定を行う
        $atte_start = isset($atte->start_time);
        $atte_end   = isset($atte->end_time);
        $rest_start = isset($rests->start_time);
        $rest_end   = isset($rests->end_time);

        //データ有無をもとに各ボタンのクリック可否を判定して返す。user以外はboolean
        $param = [
            'user'       => $data['name'],
            'atte_start' => !$atte_start,
            'atte_end'   => $atte_start && !$atte_end,
            'rest_start' => $atte_start && !$atte_end && ($rest_start === $rest_end),
            'rest_end'   => $atte_start && !$atte_end && $rest_start && !$rest_end
        ];
        return $param;
    }

    /**
     * 勤務時間の計算
     */
    public function calcAtte()
    {
        //退勤前の時、attendance->end_timeを今の時間として計算する
        if(!isset($this->end_time)){
            $this->end_time = Carbon::now()->format("H:i:s");
        }

        $atte = strtotime($this->end_time) - strtotime($this->start_time);
        $rests = Rest::sumRests($this->rests);
        $work = $atte - $rests;
        $param = [
            'rests' => self::shapeTime($rests),
            'work'  => self::shapeTime($work)
        ];
        return $param;
    }

    /**
     * 28800 -> 08:00:00
     * のように時間の形に修正する
     */
    public static function shapeTime($time)
    {
        $hours   = floor($time / 3600);
        $minutes = floor(($time / 60) % 60);
        $seconds = $time % 60;
        $shaped_time = Carbon::createFromTime($hours, $minutes, $seconds)->toTimeString();
        return $shaped_time;
    }
}
