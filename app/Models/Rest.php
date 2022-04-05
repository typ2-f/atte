<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rest extends Model
{
    use HasFactory;
    protected $fillable = ['attendance_id', 'start_time', 'end_time'];
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    /**
     * 休憩時間の合計を算出
     */
    public static function sumRests($rests)
    {
        $total = 0;
        foreach ($rests as $rest) {
            //休憩中の時、$end_timeを今の時間で計算する
            if(!isset($rest->end_time)){
                $rest->end_time = Carbon::now()->format("H:i:s");
            }
            
            $total += strtotime($rest->end_time) - strtotime($rest->start_time);
        }
        return $total;
    }
}
