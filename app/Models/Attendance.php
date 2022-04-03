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
    protected $fillable = ['user_id','date_on', 'start_time', 'end_time'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /**
     * @return AttendanceController
     * 打刻ページでのボタンの活性or非活性判定のためのデータを渡す
     */
    public static function stamp()
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format("H:i:s");


        $attendance = Attendance::where("user_id", $user->id)->where("date_on", $today)->first();
        $result = [
            'user'          => $user->name,

        ];

        return $result;
    }
}
