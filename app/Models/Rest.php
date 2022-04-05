<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            $total += strtotime($rest->end_time) - strtotime($rest->start_time);
        }
        return $total;
    }
}
