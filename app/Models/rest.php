<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rest extends Model
{
    use HasFactory;
    public function attendance()
    {
        return $this->belongsTo(attendance::class);
    }

    protected $fillable = ['start_time', 'end_time'];
}
