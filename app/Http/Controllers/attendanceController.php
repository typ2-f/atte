<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function home()
    {
        return view('stamp');
    }

    public function stamp()
    {
    }

}
